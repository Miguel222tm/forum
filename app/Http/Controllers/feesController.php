<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Fee;
use Input;
class feesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        try{
            $fees = Fee::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($fees);
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
            $fee = new Fee();
            $fee->fill(Input::all());
            $fee->save();   
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($fee);
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
            $fee= Fee::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($fee);
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
            $fee = Fee::findOrFail($id);
            $fee->fill(Input::all());
            $fee->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($fee);
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
            $fee = Fee::findOrFail($id);
            $fee->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($fee);
    }
}
