<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Languages;
use App\models\jsLanguages;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class languagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $languages = Languages::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($languages);
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
            $language = Languages::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($language);
    }


    public function jsLanguages(){
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $languages = $js->languages()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($languages);
    }

    public function jsLanguage($id){
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $language = $js->languages()->where('jobSeekerLanguageId', '=', $id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($language);
    }

    public function storeJsLanguage(Request $request){
        try{
            $language = new jsLanguages();
            $language->fill(Input::all());
            $language->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($language);
    }

    public function updateJsLanguage($id)
    {
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $language = $js->languages()->where('jobSeekerLanguageId', '=', $id)->firstOrFail();
            $language->fill(Input::all());
            $language->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($language);
    }

    public function destroyJsLanguage($id)
    {
        try{
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $language = $js->languages()->where('jobSeekerLanguageId', '=', $id)->firstOrFail();
            $language->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($language);
    }



}
