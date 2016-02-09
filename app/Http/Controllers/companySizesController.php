<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\CompanySizes;
class companySizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $size = CompanySizes::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($size);
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
            $size = CompanySizes::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($size);
    }

    
}
