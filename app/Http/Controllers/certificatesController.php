<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\models\Certificates;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class certificatesController extends Controller
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
            $certificates =  $js->certificates()->get(); 
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($certificates);
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
            $certificates  = new Certificates();
            $certificates->fill(Input::all());
            $certificates->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($certificates);

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
            $certificates = $js->certificates()->where('jobSeekerCertificateId', '=', $id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($certificates);
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
            $certificates = $js->certificates()->where('jobSeekerCertificateId', '=', $id)->firstOrFail();
            $certificates->fill(Input::all());
            $certificates->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($certificates);
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
            $certificates = $js->certificates()->where('jobSeekerCertificateId', '=', $id)->firstOrFail();
            $certificates->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($certificates);
    }
}
