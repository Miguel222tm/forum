<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\models\Volunteers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class volunteersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $volunteers = $js->volunteers()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($volunteers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $volunteers = new Volunteers();
            $volunteers->fill(Input::all());
            $volunteers->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($volunteers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $volunteers = $js->volunteers()->where('jobSeekerVolunteerId', '=', $id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($volunteers);
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
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $volunteers = $js->volunteers()->where('jobSeekerVolunteerId', '=', $id)->firstOrFail();
            $volunteers->fill(Input::all());
            $volunteers->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($volunteers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $volunteers = $js->volunteers()->where('jobSeekerVolunteerId', '=', $id)->firstOrFail();
            $volunteers->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($volunteers);
    }
}
