<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\State;
use Input;

class statesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $states = State::all();    
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($states);
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
            $State = new State();
            $State->fill(Input::all());
            $State->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($State);
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
            $State = State::find($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($State);
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
            $State = State::find($id);
            $State->fill(Input::all());
            $State->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($State);
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
            $State = State::find($id);
            $State->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($State);
    }
}
