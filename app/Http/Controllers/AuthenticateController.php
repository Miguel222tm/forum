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
            // member
            if($user->type === 1){
                $member = $user->member()->first();
                $access_level = AccessLevel::find($member->access_level);
                $functionalities = $access_level->getFunctionality()->get();
                $member->functionalities = $functionalities;
                $member->location = $location;
                return response()->json($member);

            }
            // vendor
            else if( $user->type === 2){
                $vendor = $user->vendor()->first();
                $access_level = AccessLevel::find($vendor->access_level);
                $functionalities = $access_level->getFunctionality()->get();
                $vendor->functionalities = $functionalities;
                $vendor->location = $location;  
                return response()->json($vendor);
            }
            //employee
            else if ($user->type === 3){
                $employee = $user->employee()->first();
                $access_level = AccessLevel::find($employee->access_level);
                $functionalities = $access_level->getFunctionality()->get();
                $employee->functionalities = $functionalities;
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
        return response()->json($user);
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
            $user= new User();
            $user->firstName = $credentials['firstName'];
            $user->lastName = $credentials['lastName'];
            $user->name = $credentials['name'];
            $user->email = $credentials['email'];
            $user->password = Hash::make($credentials['password']);
            $user->remember_token = Hash::make($credentials['email']);
            $user->save();
        } catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($user);
    }
    
    
    /*=====  End of registerUserByEmail  ======*/
   
    
    
}