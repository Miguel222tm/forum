<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Currency;

class currencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try{
            $cu = Currency::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($cu);
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
            $cu = Currency::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($cu);
    }

  
}
