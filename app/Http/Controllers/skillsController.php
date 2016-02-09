<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Skill;
use App\models\jsSkill;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use GuzzleHttp;

class skillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try {
            $skills = Skill::all();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($skills);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $skill = Skill::findOrFail($id);
        } catch (Exception $e) {
            return response()->json($ex);
        }
        return response()->json($skill);
    }


    public function store(){

    }


    public function jsIndex(){
        try {
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $skills = $js->skills()->get();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($skills);
    }

    public function jsShow(){
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $skill = $js->skills()->where('jobSeekerSkillId', '=', $id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($skill);
    }

    public function jsStore(){
        $newSkills = Input::all();
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();

            foreach ($newSkills as $key => $sk) {
                $skill = new jsSkill();
                $skill->fill($sk);
                $skill->save();
            }
            $skills = $js->skills()->get();
        } catch (Exception $e) {
            return response()->json($e);
        }

        return response()->json($skills);
    }

    public function jsDestroy($id){
        //just send ids so when I get the ids, i can delete them
        $newSkills  = Input::all();
        $array = array();
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            foreach($newSkills as $key => $skill) {
                $sk = $js->skills()->where('jobSeekerSkillId', '=', (int)$skill)->firstOrFail();
                $sk->delete();
            }
            $skills = $js->skills()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($skills);
    }

}
