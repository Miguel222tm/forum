<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\JobSeeker;
use Input;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class jobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $js =  JobSeeker::all();

            if($js)
            return response()->json($js);

            return response()->json("there is no job seekers on the database.");

        }catch(Exception $ex){
            return response()->json($ex);
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
        try{    
            $js = JobSeeker::findOrFail($id);
        }catch(Exception $ex){            
            return response()->json($ex);
        }
        return response()->json($js);
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
            $js = JobSeeker::findOrFail($id);
            $js->fill(Input::all());
            $js->save();

            return response()->json($js);

        }catch(Exception $ex){
            return response()->json($ex);
        }
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
            $js = JobSeeker::findOrFail($id);
            $user = User::find($js->userId);
            $user->delete();
            $js->delete();
            return response()->json("job seeker deleted sucessfully.");
        }catch(Exception $ex){
            return response()->json("job seeker deleted sucessfully.");
        }
    }
    public function profile(){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found', 404]);
            }

            $js = $user->JobSeeker()->firstOrFail();
            $resumes = $js->resumes()->get();
            $education = $js->education()->get();
            $languages = $js->languages()->get();
            $previousExperience = $js->previousExperience()->get();
            $certificates = $js->certificates()->get();
            $courses = $js->courses()->get();
            $volunteers = $js->volunteers()->get();
            $profile = array ();
            $profile['resumes'] = $resumes;
            $profile['education'] = $education;
            $profile['languages'] = $languages;
            $profile['previousExperience'] = $previousExperience;
            $profile['certificates'] = $certificates;
            $profile['courses'] = $courses;
            $profile['volunteers'] = $volunteers;
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($profile);
    }
}
