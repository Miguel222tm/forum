<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Modelo;
use Input;

class modelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $models = Modelo::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($models);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $modelo = new Modelo();
            $modelo->fill(Input::all());
            $modelo->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($modelo);
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
            $modelo = Modelo::findOrFail($id);

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($modelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $modelo = Modelo::findOrFail($id);
            $modelo->fill(Input::all());
            $modelo->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($modelo);
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
            $modelo = Modelo::findOrFail($id);
            $modelo->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($modelo);
    }
}
