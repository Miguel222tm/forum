<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Country;
use Input;

class countriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $countries = Country::all();    
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($countries);
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
            $country = new Country();
            $country->fill(Input::all());
            $country->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($country);
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
            $country = Country::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($country);
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
            $country = Country::findOrFail($id);
            $country->fill(Input::all());
            $country->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($country);
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
            $country = Country::findOrFail($id);
            $country->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($country);
    }


    public function states($id){
        try{
            $country = Country::findOrFail($id);
            $states = $country->states()->get();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($states);
    }
}
