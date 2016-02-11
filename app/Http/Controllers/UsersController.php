<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\models\Member;
use App\models\Vendor;
use App\models\Employee;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $users= User::all();
        } catch(Exception $ex){
            return response()->json($ex);
        }
            return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
         $credentials = $request->only('code');
         //return $credentials;
         try{
            $user = User::find($id);
            if($credentials['code'] === 'mem'){
                $user->type = 1;
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
            }
            if($credentials['code'] === 'ven'){
                $user->type=2;
                $hrm = new Vendor();
                $hrm->userId=$user->userId;
                $hrm->name= $user->name;
                $hrm->firstName= $user->firstName;
                $hrm->lastName = $user->lastName;
                $hrm->email = $user->email;
                $hrm->access_level = 2;
                $hrm->picture_url = $user->picture_url;
                $hrm->unique_code = str_random(20);
                $hrm->save();
            }
            if($credentials['code'] === 'emp'){
                $user->type=3;
                $cmp = new Employee();
                $cmp->userId=$user->userId;
                $cmp->name= $user->name;
                $cmp->firstName= $user->firstName;
                $cmp->lastName = $user->lastName;
                $cmp->email = $user->email;
                $cmp->access_level = 3;
                $cmp->picture_url = $user->picture_url;
                $cmp->unique_code = str_random(20);
                $cmp->save();
            }
            $user->save();
         }catch(Exception $ex){

         }

         return $user;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
