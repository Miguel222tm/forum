<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\City;
use Input;
class citiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $cities = City::all();    
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($cities);
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
            $City = new City();
            $City->fill(Input::all());
            $City->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($City);
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
            $City = City::find($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($City);
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
            $City = City::find($id);
            $City->fill(Input::all());
            $City->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($City);
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
            $City = City::find($id);
            $City->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($City);
    }
}
