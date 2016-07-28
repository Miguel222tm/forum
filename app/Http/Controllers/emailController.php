<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Mail;
use Mailgun\Mailgun;
use Input;
use JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testemail()
    {
      // FIXME: Kien setup reciepient to Migule eventiq for now to test. Please change it later.
      $this->sendMail(
          'miguel.trevino@eventiq.com',
          'This is a notifications from Mailgun',
          'This is a notifications from Mailgun. This is a notifications from Mailgun'
      );
    }

    public function sendMail($to, $subject, $message) {
      $mg = new Mailgun(env('MAILGUN_SECRET'));
      $domain = env('MAILGUN_DOMAIN');

      // FIXME: Please change 'from' and 'to' values 
      $return = $mg->sendMessage($domain, array(
        'from'    => 'admin@dancein.tv',
        'to'      => $to,
        'subject' => $subject,
        'text'    => $message
      ));
        
      echo var_dump($return);
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
        //return Input::all()['user']['name'];
        if(Input::all()['type'] === 'emails.forgot'){
            $user = User::findOrFail(Input::all()['user']['userId']);
            $user->remember_token = str_random(15);
            $user->save();
            $key = $user->remember_token;
        }else{
            $key = "";
        }
        $sent = Mail::send(Input::all()['type'], array('key' => $key, 'name'=> Input::all()['user']['name']), function($message)
        {
            $message->from('membership.relations@clubmein.com');
            // $message->embed('/images/default_picture.png');
            $message->to(Input::all()['user']['email'], Input::all()['user']['name'])->subject(Input::all()['title']);
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

    public function sendInvite(){
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $sent = Mail::send('emails.invitation', array('from' => $user->name, 'to'=> Input::all()['to']), function($message) use ($user)
            {
                $message->from('membership.relations@clubmein.com');
                $message->to(Input::all()['email'], Input::all()['to'])->subject('Join ClubMeIn.com community!');
            });

            if($sent){
                return response()->json('email sent', 200);
            }
        }catch (Exception $e) {
            return response()->json($e);
        }


    }


}
