<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Brand;
use Input;

class brandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $brands = Brand::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($brands);
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
            $brand = new Brand();
            $brand->fill(Input::all());
            $brand->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($brand);
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
            $brand = Brand::findOrFail($id);

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($brand);
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
            $brand = Brand::findOrFail($id);
            $brand->fill(Input::all());
            $brand->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($brand);
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
            $brand = Brand::findOrFail($id);
            $brand->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($brand);
    }

    public function models($id){
        try{
            $brand = Brand::findOrFail($id);
            $models = $brand->models()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($models);
    }
}
