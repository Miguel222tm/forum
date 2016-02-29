<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\USer;
use Hash;
class emailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
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


    public function sendEmail(){
        # Include the Autoloader (see "Libraries" for install instructions)
        //return Input::all()['email'];
        $title = Input::all()['title'];
        $receiver_name = Input::all()['name'];
        $email = Input::all()['email'];
        $email_type = Input::all()['email_type'];

        if($email_type === 'emails.verification'){
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $key = $user->remember_token;
        }else{
            $key = "";
        }

        $sent = Mail::send($email_type, array('key' => $key, 'name'=> Input::all()['name']), function($message)
        {
            $message->from('uuorkstore.inc@gmail.com');
            $message->to(Input::all()['email'], Input::all()['name'])->subject(Input::all()['title']);
        });

        if($sent){
            return response()->json('email sent', 200);      
        }
    }


    public function verifyUser(){
        try {
            if(Input::has('code')){
                $user = User::where('remember_token','=',Input::all()['code'])->firstOrFail();
                return $user;

            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function confirmUser($id){
        try {
            $user = User::findOrFail($id);
            $user->fill(Input::all());
            $user->save();

        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($user);
    }


}
