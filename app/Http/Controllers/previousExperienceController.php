<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\PreviousExperience;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class previousExperienceController extends Controller
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
            $previousExperience = $js->previousExperience()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($previousExperience);
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
            $previousExperience = new PreviousExperience();
            $previousExperience->fill(Input::all());
            $previousExperience->save();    
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($previousExperience);
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
            $previousExperience = $js->previousExperience()->where('previousExperienceId', '=', $id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($previousExperience);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            $previousExperience = $js->previousExperience()->where('previousExperienceId', '=', $id)->firstOrFail();
            $previousExperience->fill(Input::all());
            $previousExperience->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($previousExperience);
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
            $previousExperience = $js->previousExperience()->where('previousExperienceId', '=', $id)->firstOrFail();
            $previousExperience->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($previousExperience);
    }
}
