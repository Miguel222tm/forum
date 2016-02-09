<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Industry;

class industriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $industry = Industry::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($industry);
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
            $industry = Industry::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($industry);
    }

   
}
