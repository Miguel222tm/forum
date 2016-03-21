<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Hash;
use App\models\AccessLevel;
use Mail;
use Input;


class AuthenticateController extends Controller
{
    
    public function index()
    {
        // Retrieve all the users in the database and return them
        $users = User::all();
        return $users;
    }
    
    public function getSessionUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $location = $user->location()->first();
            //return $user;
            // member
            if($user->type === 1 && $user->active === 1){
                $member = $user->member()->first();
                $access_level = AccessLevel::find($member->access_level);
                $functionalities = $access_level->getFunctionality()->get();
                $member->functionalities = $functionalities;
                $member->location = $location;
                $member->user= $user;
                return response()->json($member);

            }
            // vendor
            else if( $user->type === 2 && $user->active === 1){
                $vendor = $user->vendor()->first();
                $access_level = AccessLevel::find($vendor->access_level);
                $functionalities = $access_level->getFunctionality()->get();
                $vendor->functionalities = $functionalities;
                $vendor->location = $location;
                $vendor->user= $user;
                return response()->json($vendor);
            }
            //employee
            else if ($user->type === 3 && $user->active === 1){
                $employee = $user->employee()->first();
                $access_level = AccessLevel::find($employee->access_level);
                $functionalities = $access_level->getFunctionality()->get();
                $employee->functionalities = $functionalities;
                $employee->user= $user;
                return response()->json($employee);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        if($user->active === true || $user->active === 1)
            return response()->json($user);
        else{
            return response()->json(["verify" => true, "email"=> $user->email]);
        }
    }    
  
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'email or password incorrect'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
    
    
    /*===========================================
    =            registerUserByEmail            =
    ===========================================*/
    
    /**
     * @param  request
     * @return [user]
     */
    public function registerUserByEmail(Request $request)
    {
        $credentials= $request->only('name', 'firstName','lastName', 'email', 'password');
        try{
            if ($user = User::where('email','=',$credentials['email'])->first()) {
                
            }
            if(!isset($user->userId)){
                $user= new User();
                $user->firstName = $credentials['firstName'];
                $user->lastName = $credentials['lastName'];
                $user->name = $credentials['name'];
                $user->email = $credentials['email'];
                $user->password = Hash::make($credentials['password']);
                $user->remember_token = str_random(15);
                $user->active = false;
                $user->save();

                $sent = Mail::send('emails.verification', array('key' => $user->remember_token, 'name'=> $user->name), function($message)
                {
                    $message->from('membership.relations@clubmein.com');
                    $message->to(Input::all()['email'], Input::all()['name'])->subject('Email verification');
                });

                if($sent)
                    return response()->json($user);
            }else{
                return "account already created";
            }

        } catch(Exception $ex){
            return response()->json($ex);
        }
        
    }
    
    
    /*=====  End of registerUserByEmail  ======*/
   
    
    
}