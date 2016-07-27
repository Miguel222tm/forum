<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         # Include the Autoloader (see "Libraries" for install instructions)
        //return Input::all()['email'];
        $title = "titulo";
        $receiver_name = 'Miguel Trevino';
        $email = 'xelha@mailinator.com';
        $email_type = 'emails.test';

        

        $sent = Mail::send($email_type, array('key' => 'yd7syd7suyd7d9k3w3d', 'name'=> $receiver_name), function($message)
        {
            $message->from('membership.relations@clubmein.com');
            $message->embed('/images/fun.jpg');
            $message->to('xelha@mailinator.com', 'Miguel Trevino')->subject('$title');
        });

        if($sent){
           echo "sent";      
        }
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
}
