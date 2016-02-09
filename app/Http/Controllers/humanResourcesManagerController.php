<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\HumanResourcesManager;
use App\User;
use Input;

class humanResourcesManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $hr = HumanResourcesManager::all();
            return response()->json($hr);
        }catch(Exception $ex){
            return response()->json($ex);
        }
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
            $hr = HumanResourcesManager::findOrFail($id);
            return response()->json($hr);
        }catch(Exception $ex){
            return response()->json($ex);
        }
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
            $hr = HumanResourcesManager::findOrFail($id);
            $hr->fill(Input::all());
            $hr->save();

            return response()->json($hr);
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
            $hr = HumanResourcesManager::find($id);
            $user = User::findOrFail($hr->userId);
            $user->delete();
            $hr->delete();
            return response()->json("user deleted sucessfully.");
        }catch(Exception $ex){
            return response()->json($ex);
        }
    }

    //I'm already getting the id of the human resources manager with the user logged in with his token
    public function companies(){
        try{
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $hrm = $user->HumanResourcesManager()->firstOrFail();
            $companies = $hrm->companies()->get();
            
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($companies);    
    }
}
