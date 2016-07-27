<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Category;
use Input;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //return Input::all();
        try{
            $categories = Category::all();
            if(Input::has('bundle')){
                $categories = Category::with(['products'=> function($query){
                    $query->with(['brands'=> function($query){
                        $query->with('models');
                    }]);
                }])->get();//()->with(['brands'=> function($query){
                   // $query->with('models');
                //}])->get();
            }
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($categories);
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
            $category = new Category();
            $category->fill(Input::all());
            $category->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($category);
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
            $category = Category::findOrFail($id);

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($category);
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
            $category = Category::findOrFail($id);
            $category->fill(Input::all());
            $category->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($category);
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
            $category = Category::findOrFail($id);
            $category->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($category);
    }

    public function products($id){
        try{
            $category = Category::findOrFail($id);
            $products = $category->products()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($products);
    }
}
