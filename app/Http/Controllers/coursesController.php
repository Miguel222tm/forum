<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\models\Courses;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class coursesController extends Controller
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
            $courses = $js->courses()->get();   
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($courses);
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
            $course = new Courses();
            $course->fill(Input::all());
            $course->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($course);
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
            $courses = $js->courses()->where('jobSeekerCourseId', '=', $id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($courses);
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
            $courses = $js->courses()->where('jobSeekerCourseId', '=', $id)->firstOrFail();
            $courses->fill(Input::all());
            $courses->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($courses);
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
            $courses = $js->courses()->where('jobSeekerCourseId', '=', $id)->firstOrFail();
            $courses->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($courses);
    }
}
