<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Comment;
use App\Reply;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class CommentsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $comment = new Comment();
            $comment->fill($request->all());
            $comment->save();
            $comment->user = $comment->user()->first();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($comment);
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
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $allow = $user->type;
            if($allow){
                $comment = Comment::findOrFail($id);
                $comment->delete();
            }else{
                $comment = Comment::where('userId', $user->userId)->findOrFail($id);
                $comment->delete();
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($comment);
    }

    public function reply(Request $request){
        try {
            $reply = new Reply();
            $reply->fill($request->all());
            $reply->save();
            $reply->user = $reply->user()->first();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($reply);
    }
}
