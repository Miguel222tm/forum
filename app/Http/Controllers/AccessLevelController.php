<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\AccessLevel;

class AccessLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $accessLevel = AccessLevel::all();
        } catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($accessLevel);
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
            $accessLevel = AccessLevel::find($id);
        } catch( Exception $ex){
            return response()->json($ex);
        }
        return response()->json($accessLevel);
    }
}
