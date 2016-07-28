<?php namespace App\Http\Controllers;

use Hash;
use Config;
use Validator;
use Illuminate\Http\Request;
use GuzzleHttp;
use App\User;
use App\models\Member;
use App\models\UsersAccessToken;
use DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class socialAuthController extends Controller {

    /**
     * Generate JSON Web Token.
     */
    protected function createToken($user)
    {
        /*$payload = [
            'sub' => $user->userId,
            'iat' => time(),
            'exp' => time() + (2 * 7 * 24 * 60 * 60)
        ];*/
        $credentials =[];
        $credentials['email'] = $user->email;
        $credentials['password'] = $user->password;
        $token = JWTAuth::fromUser($user);
        return $token;
        
    }


    /**
     * Unlink provider.
     */
    public function unlink(Request $request, $provider)
    {
        $user = User::find($request['user']['sub']);

        if (!$user)
        {
            return response()->json(['message' => 'User not found']);
        }

        $user->$provider = '';
        $user->save();
        
        return response()->json(array('token' => $this->createToken($user)));
    }

    /**
     * Log in with Email and Password.
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first();

        if (!$user)
        {
            return response()->json(['message' => 'Wrong email and/or password'], 401);
        }

        if (Hash::check($password, $user->password))
        {
            unset($user->password);

            return response()->json(['token' => $this->createToken($user)]);
        }
        else
        {
            return response()->json(['message' => 'Wrong email and/or password'], 401);
        }
    }

    /**
     * Create Email and Password Account.
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'displayName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        $user = new User;
        $user->displayName = $request->input('displayName');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['token' => $this->createToken($user)]);
    }

    /**
     * Login with Facebook.
     */
    public function facebook(Request $request)
    {
        try{
            DB::beginTransaction();
            $client = new GuzzleHttp\Client(['verify' => 'cacert.pem']);

            $params = [
                'code' => $request->input('code'),
                'client_id' => $request->input('clientId'),
                'redirect_uri' => $request->input('redirectUri'),
                'client_secret' => 'f5a069c751b01d5e54b2624202243b53'
            ];

            // Step 1. Exchange authorization code for access token.
            $accessTokenResponse = $client->request('GET', 'https://graph.facebook.com/v2.5/oauth/access_token', [
                'query' => $params
            ]);
            $accessToken = json_decode($accessTokenResponse->getBody(), true);
            //return $accessToken;

            // Step 2. Retrieve profile information about the current user.
            $profileResponse = $client->request('GET', 'https://graph.facebook.com/v2.5/me?access_token='.$accessToken['access_token'].'&fields=bio,email,first_name,last_name,name,middle_name,picture');
            $pictureResponse = $client->request('GET','https://graph.facebook.com/v2.5/me/picture?width=500&height=500&redirect=false&access_token='.$accessToken['access_token']);
            $picture = json_decode($pictureResponse->getBody(), true);

           // $profile = json_decode($profileResponse->getBody(), true);
            $profile= json_decode($profileResponse->getBody(), true);
            // Step 3a. If user is already signed in then link accounts.
             $user = User::where('facebookId', '=', $profile['id'])->first();
            if ($user) {
                return response()->json(['token' => $this->createToken($user)]);
            }

            $other = User::where('email', '=', $profile['email'])->first();

            if($other){
                $other->facebookId  = $profile['id'];
                $other->save();
                return response()->json(['token' => $this->createToken($other)]);
            }

            $user = new User;
            $user->facebookId = $profile['id'];
            $user->email = $profile['email'];
            $user->password = Hash::make($user->facebookId);
            $user->name = $profile['name'];
            $user->firstName = $profile['first_name'];
            $user->lastName = $profile['last_name'];
            $user->picture_url = $picture['data']['url'];
            $user->active = 1;
            $user->type = 0;
            
            $user->save();
            //save access token :D 
            $userAccessToken = new UsersAccessToken;
            $userAccessToken->usersId = $user->userId;
            $userAccessToken->tokenSource = 'facebook';
            $userAccessToken->access_token = $accessToken['access_token'];
            $userAccessToken->expires_in = $accessToken['expires_in'];
            $userAccessToken->save();

            DB::commit();
            return $token= response()->json(['token' => $this->createToken($user)]);
            
        }catch(Exception $ex){
            return response()->json($ex);
        }
    }

    /**
     * Login with Google.
     */
    public function google(Request $request)
    {
        try{
            DB::beginTransaction();
            $client = new GuzzleHttp\Client(['verify' => 'cacert.pem']);
            $params = [
                'code' => $request->input('code'),
                'client_id' => $request->input('clientId'),
                'client_secret' => 'i0Rmn8tOo-f7CMoXhtPQoX41',
                'redirect_uri' => $request->input('redirectUri'),
                'grant_type' => 'authorization_code',
            ];

            // Step 1. Exchange authorization code for access token.
            $accessTokenResponse = $client->request('POST', 'https://accounts.google.com/o/oauth2/token', [
                'form_params' => $params
            ]);
            
            $accessToken = json_decode($accessTokenResponse->getBody(), true);
            //return $accessToken;
            // Step 2. Retrieve profile information about the current user.
            $profileResponse = $client->request('GET', 'https://www.googleapis.com/plus/v1/people/me', [
                'headers' => array('Authorization' => 'Bearer ' . $accessToken['access_token'])
            ]);

            $profile = json_decode($profileResponse->getBody(), true);
            
            $picture = explode('?sz=50',$profile['image']['url']);
            // Step 3. Create a new user account or return an existing one.
            $user = User::where('googleId', '=', $profile['id'])->first();
            if ($user) {
                return response()->json(['token' => $this->createToken($user)]);
            }

            $other = User::where('email', '=', $profile['emails'][0]['value'])->first();

            if($other){
                $other->googleId  = $profile['id'];
                $other->save();
                return response()->json(['token' => $this->createToken($other)]);
            }

            $user = new User;
            $user->type = 1;
            $user->googleId = $profile['id'];
            $user->email = $profile['emails'][0]['value'];
            $user->password = Hash::make($user->googleId);
            $user->name = $profile['displayName'];
            $user->firstName = $profile['name']['givenName'];
            $user->lastName = $profile['name']['familyName'];
            $user->picture_url = $picture[0];
            $user->active = 1;
            
            
            $user->save();
            //save access token :D 
            $userAccessToken = new UsersAccessToken;
            $userAccessToken->usersId = $user->userId;
            $userAccessToken->tokenSource = 'google';
            $userAccessToken->access_token = $accessToken['access_token'];
            $userAccessToken->expires_in = $accessToken['expires_in'];
            $userAccessToken->save();

            $js = new Member();
                $js->userId = $user->userId;
                $js->name = $user->name;
                $js->firstName = $user->firstName;
                $js->lastName = $user->lastName;
                $js->email = $user->email;
                $js->access_level = 1;
                $js->picture_url = $user->picture_url;
                $js->unique_code = str_random(20);
                $js->save();
            



            DB::commit();
            return $token= response()->json(['token' => $this->createToken($user)]);

        } catch(Exception $ex){
            DB::rollBack();
            return response()->json($ex);
        }
    }

    /**
     * Login with LinkedIn.
     */
    public function linkedin(Request $request)
    {   
        try{
            DB::beginTransaction();
            $client = new GuzzleHttp\Client(['verify' => 'cacert.pem']);

            $params = [
                'code' => $request->input('code'),
                'client_id' => $request->input('clientId'),
                'client_secret' => 'V3Wodkq3xKXjUgRu',
                'redirect_uri' => $request->input('redirectUri'),
                'grant_type' => 'authorization_code',
            ];

            // Step 1. Exchange authorization code for access token.
            $accessTokenResponse = $client->request('POST', 'https://www.linkedin.com/uas/oauth2/accessToken', [
                'form_params' => $params
            ]);
            $accessToken = json_decode($accessTokenResponse->getBody(), true);
            // Step 2. Retrieve profile information about the current user.
            $profileResponse = $client->request('GET', 'https://api.linkedin.com/v1/people/~:(id,first-name,last-name,email-address,num-connections,picture-urls::(original))', [
                'query' => [
                    'oauth2_access_token' => $accessToken['access_token'],
                    'format' => 'json'
                ]
            ]);
            $profile = json_decode($profileResponse->getBody(), true);
            //return $profile;
            // Step 3a. If user is already signed in then link accounts.
             $user = User::where('linkedinId', '=', $profile['id'])->first();
            if ($user) {
                return response()->json(['token' => $this->createToken($user)]);
            }

            $other = User::where('email', '=', $profile['emailAddress'])->first();

            if($other){
                $other->linkedInId  = $profile['id'];
                $other->save();
                return response()->json(['token' => $this->createToken($other)]);
            }

            $user = new User;
            $user->linkedInId = $profile['id'];
            $user->email = $profile['emailAddress'];
            $user->password = Hash::make($user->linkedInId);
            $user->firstName = $profile['firstName'];
            $user->lastName = $profile['lastName'];
            $user->name = $user->firstName. " ". $user->lastName;
            $user->picture_url = $profile['pictureUrls']['values'][0];
            $user->active = 1;
            $user->type = 0;
            
            $user->save();
            //save access token :D 
            $userAccessToken = new UsersAccessToken;
            $userAccessToken->usersId = $user->userId;
            $userAccessToken->tokenSource = 'linkedin';
            $userAccessToken->access_token = $accessToken['access_token'];
            $userAccessToken->expires_in = $accessToken['expires_in'];
            $userAccessToken->save();

            DB::commit();
            return $token= response()->json(['token' => $this->createToken($user)]);

        } catch(Exception $ex){
            DB::rollBack();
            return response()->json($ex);
        }


    }

    /**
     * Login with Twitter.
     */
    public function twitter(Request $request)
    {
        $stack = GuzzleHttp\HandlerStack::create();

        // Part 1 of 2: Initial request from Satellizer.
        if (!$request->input('oauth_token') || !$request->input('oauth_verifier'))
        {
            $stack = GuzzleHttp\HandlerStack::create();

            $requestTokenOauth = new Oauth1([
              'consumer_key' => Config::get('app.twitter_key'),
              'consumer_secret' => Config::get('app.twitter_secret'),
              'callback' => $request->input('redirectUri'),
              'token' => '',
              'token_secret' => ''
            ]);
            $stack->push($requestTokenOauth);

            $client = new GuzzleHttp\Client([
                'handler' => $stack
            ]);

            // Step 1. Obtain request token for the authorization popup.
            $requestTokenResponse = $client->request('POST', 'https://api.twitter.com/oauth/request_token', [
                'auth' => 'oauth'
            ]);

            $oauthToken = array();
            parse_str($requestTokenResponse->getBody(), $oauthToken);

            // Step 2. Send OAuth token back to open the authorization screen.
            return response()->json($oauthToken);

        }
        // Part 2 of 2: Second request after Authorize app is clicked.
        else
        {
            $accessTokenOauth = new Oauth1([
                'consumer_key' => Config::get('app.twitter_key'),
                'consumer_secret' => Config::get('app.twitter_secret'),
                'token' => $request->input('oauth_token'),
                'verifier' => $request->input('oauth_verifier'),
                'token_secret' => ''
            ]);
            $stack->push($accessTokenOauth);

            $client = new GuzzleHttp\Client([
                'handler' => $stack
            ]);

            // Step 3. Exchange oauth token and oauth verifier for access token.
            $accessTokenResponse = $client->request('POST', 'https://api.twitter.com/oauth/access_token', [
                'auth' => 'oauth'
            ]);

            $accessToken = array();
            parse_str($accessTokenResponse->getBody(), $accessToken);

            $profileOauth = new Oauth1([
                'consumer_key' => Config::get('app.twitter_key'),
                'consumer_secret' => Config::get('app.twitter_secret'),
                'oauth_token' => $accessToken['oauth_token'],
                'token_secret' => ''
            ]);
            $stack->push($profileOauth);

            $client = new GuzzleHttp\Client([
                'handler' => $stack
            ]);

            // Step 4. Retrieve profile information about the current user.
            $profileResponse = $client->request('GET', 'https://api.twitter.com/1.1/users/show.json?screen_name=' . $accessToken['screen_name'], [
                'auth' => 'oauth'
            ]);
            $profile = json_decode($profileResponse->getBody(), true);

            // Step 5a. Link user accounts.
            if ($request->header('Authorization'))
            {
                $user = User::where('twitter', '=', $profile['id']);
                if ($user->first())
                {
                    return response()->json(['message' => 'There is already a Twitter account that belongs to you'], 409);
                }

                $token = explode(' ', $request->header('Authorization'))[1];
                $payload = (array) JWT::decode($token, Config::get('app.token_secret'), array('HS256'));

                $user = User::find($payload['sub']);
                $user->twitter = $profile['id'];
                $user->displayName = $user->displayName ?: $profile['screen_name'];
                $user->save();

                return response()->json(['token' => $this->createToken($user)]);
            }
            // Step 5b. Create a new user account or return an existing one.
            else
            {
                $user = User::where('twitter', '=', $profile['id']);

                if ($user->first())
                {
                    return response()->json(['token' => $this->createToken($user->first())]);
                }

                $user = new User;
                $user->twitter = $profile['id'];
                $user->displayName = $profile['screen_name'];
                $user->save();

                return response()->json(['token' => $this->createToken($user)]);
            }
        }
    }

    /**
     * Login with Foursquare.
     */
    public function foursquare(Request $request)
    {
        $client = new GuzzleHttp\Client();

        $params = [
            'code' => $request->input('code'),
            'client_id' => $request->input('clientId'),
            'client_secret' => Config::get('app.foursquare_secret'),
            'redirect_uri' => $request->input('redirectUri'),
            'grant_type' => 'authorization_code',
        ];

        // Step 1. Exchange authorization code for access token.
        $accessTokenResponse = $client->request('POST', 'https://foursquare.com/oauth2/access_token', [
            'form_params' => $params
        ]);
        $accessToken = json_decode($accessTokenResponse->getBody(), true);

        // Step 2. Retrieve profile information about the current user.
        $profileResponse = $client->request('GET', 'https://api.foursquare.com/v2/users/self', [
            'query' => [
                'v' => '20140806',
                'oauth_token' => $accessToken['access_token']
            ]
        ]);

        $profile = json_decode($profileResponse->getBody(), true)['response']['user'];

        // Step 3a. If user is already signed in then link accounts.
        if ($request->header('Authorization'))
        {
            $user = User::where('foursquare', '=', $profile['id']);
            if ($user->first())
            {
                return response()->json(array('message' => 'There is already a Foursquare account that belongs to you'), 409);
            }

            $token = explode(' ', $request->header('Authorization'))[1];
            $payload = (array) JWT::decode($token, Config::get('app.token_secret'), array('HS256'));

            $user = User::find($payload['sub']);
            $user->foursquare = $profile['id'];
            $user->displayName = $user->displayName ?: $profile['firstName'] . ' ' . $profile['lastName'];
            $user->save();

            return response()->json(['token' => $this->createToken($user)]);
        }
        // Step 3b. Create a new user account or return an existing one.
        else
        {
            $user = User::where('foursquare', '=', $profile['id']);

            if ($user->first())
            {
                return response()->json(['token' => $this->createToken($user->first())]);
            }

            $user = new User;
            $user->foursquare = $profile['id'];
            $user->displayName =  $profile['firstName'] . ' ' . $profile['lastName'];
            $user->save();

            return response()->json(['token' => $this->createToken($user)]);
        }
    }

    /**
     * Login with Instagram.
     */
    public function instagram(Request $request)
    {
        $client = new GuzzleHttp\Client();

        $params = [
            'code' => $request->input('code'),
            'client_id' => $request->input('clientId'),
            'client_secret' => Config::get('app.instagram_secret'),
            'redirect_uri' => $request->input('redirectUri'),
            'grant_type' => 'authorization_code',
        ];

        // Step 1. Exchange authorization code for access token.
        $accessTokenResponse = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
            'body' => $params
        ]);
        $accessToken = json_decode($accessTokenResponse->getBody(), true);

        // Step 2a. If user is already signed in then link accounts.
        if ($request->header('Authorization'))
        {
            $user = User::where('instagram', '=', $accessToken['user']['id']);
            if ($user->first())
            {
                return response()->json(array('message' => 'There is already an Instagram account that belongs to you'), 409);
            }

            $token = explode(' ', $request->header('Authorization'))[1];
            $payload = (array) JWT::decode($token, Config::get('app.token_secret'), array('HS256'));

            $user = User::find($payload['sub']);
            $user->instagram = $accessToken['user']['id'];
            $user->displayName = $user->displayName ?: $accessToken['user']['username'];
            $user->save();

            return response()->json(['token' => $this->createToken($user)]);
        }
        // Step 2b. Create a new user account or return an existing one.
        else
        {
            $user = User::where('instagram', '=', $accessToken['user']['id']);

            if ($user->first())
            {
                return response()->json(['token' => $this->createToken($user->first())]);
            }

            $user = new User;
            $user->instagram = $accessToken['user']['id'];
            $user->displayName =  $accessToken['user']['username'];
            $user->save();

            return response()->json(['token' => $this->createToken($user)]);
        }
    }

    /**
     * Login with GitHub.
     */
    public function github(Request $request)
    {
        $client = new GuzzleHttp\Client();

        $params = [
            'code' => $request->input('code'),
            'client_id' => $request->input('clientId'),
            'client_secret' => Config::get('app.github_secret'),
            'redirect_uri' => $request->input('redirectUri')
        ];

        // Step 1. Exchange authorization code for access token.
        $accessTokenResponse = $client->request('GET', 'https://github.com/login/oauth/access_token', [
            'query' => $params
        ]);

        $accessToken = array();
        parse_str($accessTokenResponse->getBody(), $accessToken);

        // Step 2. Retrieve profile information about the current user.
        $profileResponse = $client->request('GET', 'https://api.github.com/user', [
            'headers' => ['User-Agent' => 'Satellizer'],
            'query' => $accessToken
        ]);
        $profile = json_decode($profileResponse->getBody(), true);

        // Step 3a. If user is already signed in then link accounts.
        if ($request->header('Authorization'))
        {
            $user = User::where('github', '=', $profile['id']);

            if ($user->first())
            {
                return response()->json(['message' => 'There is already a GitHub account that belongs to you'], 409);
            }

            $token = explode(' ', $request->header('Authorization'))[1];
            $payload = (array) JWT::decode($token, Config::get('app.token_secret'), array('HS256'));

            $user = User::find($payload['sub']);
            $user->github = $profile['id'];
            $user->displayName = $user->displayName ?: $profile['name'];
            $user->save();

            return response()->json(['token' => $this->createToken($user)]);
        }
        // Step 3b. Create a new user account or return an existing one.
        else
        {
            $user = User::where('github', '=', $profile['id']);

            if ($user->first())
            {
                return response()->json(['token' => $this->createToken($user->first())]);
            }

            $user = new User;
            $user->github = $profile['id'];
            $user->displayName = $profile['name'];
            $user->save();

            return response()->json(['token' => $this->createToken($user)]);
        }
    }
}
