<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use DB;
use Input;
use App\models\jsEducation;


class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $education = $js->education()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($education);
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
            if(!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $education = new jsEducation();
            $education->fill(Input::all());
            $education->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($education);
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
            if(!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $education = $js->education()->where('jobSeekerEducationId', '=', $id)->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($education);
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
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found', 404]);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $education = $js->education()->where('jobSeekerEducationId', '=', $id)->firstOrFail();
            $education->fill(Input::all());
            $education->save(); 
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($education);
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
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found', 404]);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $education = $js->education()->where('jobSeekerEducationId', '=', $id)->firstOrFail();
            $education->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($education);
    }
}
