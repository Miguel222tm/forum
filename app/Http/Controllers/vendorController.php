<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Vendor;
use App\User;
use Input;
use App\models\VendorProduct;
class vendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $Vendor = Vendor::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Vendor);
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
            $Vendor = new Vendor();
            $Vendor->fill(Input::all());
            $Vendor->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Vendor);
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
            $Vendor = Vendor::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Vendor);
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
            $Vendor = Vendor::findOrFail($id);
            $Vendor->fill(Input::all());
            $Vendor->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Vendor);
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
            $Vendor = Vendor::findOrFail($id);
            $userv = User::findOrFail($js->userId);
            $user->delete();
            $Vendor->delete();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Vendor);
    }




    public function products($id){

        try {
            $vendor = Vendor::findOrFail($id);
            $products = $vendor->products()->get();
        } catch (Exception $ex) {
            return response()->json($ex);
        }
        return response()->json($products);

    }

    public function storeProduct(){
        try {
            $product = new VendorProduct();
            $product->fill(Input::all());
            $product->save();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($product);
    }

    public function destroyProduct($id){
        try {
            $product = VendorProduct::findOrFail($id);
            $product->delete();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($product);
    }
}
