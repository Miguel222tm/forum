<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Company;
use App\User;
use Input;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $c = Company::all();
            return response()->json($c);
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
            $c = Company::findOrFail($id);
            return response()->json($c);
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
            $company = Company::findOrFail($id);
            $company->fill(Input::all());
            $company->save();
            

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($company);
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
            $c = Company::findOrFail($id);
            $user = User::findOrFail($c->userId);
            $user->delete();
            $c->delete();

            return response()->json("user deleted successfully.");

        }catch(Exception $ex){
            return response()->json($ex);
        }
    }


    //I'm already getting the id of the human resources manager with the user logged in with his token
    public function humanResourcesManagers(){
        try{
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $company = $user->Company()->firstOrFail();
            $hrManagers = $company->hrManagers()->get();
            
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($hrManagers);    
    }
}
