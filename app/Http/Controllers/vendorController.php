<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Vendor;
use App\User;
use Input;
use App\models\VendorProduct;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\models\Brand;
use App\models\Item;
use App\models\Modelo;
use App\models\ItemLocation;
use App\models\Bid;
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
            $Vendor = Vendor::with('user')->get();
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
            $Vendor = Vendor::where('vendorId', '=', $id)->with('user')->firstOrFail();
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
            $user = User::findOrFail($js->userId);
            $user->delete();
            $Vendor->delete();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Vendor);
    }




    public function products(){

        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $vendor = $user->vendor()->first();
            $products = $vendor->products()->get();
            foreach ($products as $product) {
                $product->buyers = Item::where('modelId', '=', $product->modelId)->get();
            }

        } catch (Exception $ex) {
            return response()->json($ex);
        }
        return response()->json($products);

    }

    public function storeProduct(){
        try {

            if(Input::all()['modelId'] === 'All'){

                $brand = Brand::where('brandId', '=', Input::all()['brandId'])->with('models')->first();
                $array = [];
                foreach($brand->models as $model) {
                    $server = VendorProduct::where('modelId', '=', $model->modelId)->where('vendorId', '=', Input::all()['vendorId'])->first();
                    if(!$server){
                        $product = new VendorProduct();
                        $product->fill(Input::all());
                        $product->modelId = $model->modelId;
                        $product->model_name = $model->name;
                        $product->save();
                        array_push($array, $product);
                    }
                }
                return response()->json($array);
            }else{
                $product = new VendorProduct();
                $product->fill(Input::all());
                $product->save();
            }
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

    public function showBids(){
        try{
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $vendor = $user->vendor()->first();
            $bids = $vendor->bids()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($bids);
    }


    public function bidingSection(){
       
        try{
            
            $mainItem = Item::where('modelId', '=', Input::all()['id'])->first();
            $itemsList = [];
            $All = [];
            $modelList = [];
            if($mainItem){
                $brandList = ['name' => $mainItem->brand_name, 'id' => $mainItem->brandId];
            }else{
                $model = Modelo::find(Input::all()['id']);
                $brand = $model->brand()->first();
                $mainItem = (object) [];
                $mainItem->brand_name = $brand->name;
                $mainItem->brandId = $brand->brandId;
                $brandList = ['name' => $mainItem->brand_name, 'id' => $mainItem->brandId];
            }
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $userLocation = $user->location()->first();

            $vendor = $user->vendor()->first();
            if(isset($mainItem->modelId)){
                $itemLocationCity = ItemLocation::where('city', '=', $userLocation->city)->with(['item' => function($query){
                    $query->where('modelId', '=', Input::all()['id']);
                }])->get();
                $itemsCity = [];
                foreach ($itemLocationCity as $location) {
                    if($location->item)
                        array_push($itemsCity, $location->item);
                }
                $itemLocationState = ItemLocation::where('state', '=', $userLocation->state)->where('city', '!=', $userLocation->city)->with(['item' => function($query){
                    $query->where('modelId', '=', Input::all()['id']);
                }])->get();
                $itemsState = [];
                foreach ($itemLocationState as $location) {
                    if($location->item)
                        array_push($itemsState, $location->item);
                }
                $itemLocationCountry = ItemLocation::where('country', '=', $userLocation->country)->where('state', '!=', $userLocation->state)->with(['item' => function($query){
                    $query->where('modelId', '=', Input::all()['id']);
                }])->get();
                $itemsCountry = [];
                foreach ($itemLocationCountry as $location) {
                    if($location->item)
                        array_push($itemsCountry, $location->item);
                }

                $itemLocationWorld = ItemLocation::where('country', '!=', $userLocation->country)->with(['item' => function($query){
                    $query->where('modelId', '=', Input::all()['id']);
                }])->get();
                $itemsWorld = [];
                foreach ($itemLocationWorld as $location) {
                    if($location->item){
                        array_push($itemsWorld, $location->item);
                    }
                }
                $modelList = ['name' => $mainItem->model_name, 'id' => $mainItem->modelId, 'brand_name' => $mainItem->brand_name, 'brandId' => $mainItem->brandId,  'city'=>$itemsCity,'state'=>$itemsState, 'country'=> $itemsCountry, 'world' => $itemsWorld];
            }
        
            //***   ******************************************
            //other models
            $otherModels = Brand::where('brandId','=', $mainItem->brandId)->with(['models' => function($query){
                $query->where('modelId','!=', Input::all()['id']);
            }])->first();

            foreach ($otherModels->models as $otherModel) {
                
                $itemLocationCity = ItemLocation::where('city', '=', $userLocation->city)->with(['item' => function($query) use($otherModel){
                $query->where('modelId', '=', $otherModel->modelId);
                }])->get();
                $itemsCity = [];
                foreach ($itemLocationCity as $location) {
                    if($location->item)
                        array_push($itemsCity, $location->item);
                }
                $itemLocationState = ItemLocation::where('state', '=', $userLocation->state)->where('city', '!=', $userLocation->city)->with(['item' => function($query) use($otherModel){
                    $query->where('modelId', '=', $otherModel->modelId);
                }])->get();
                $itemsState = [];
                foreach ($itemLocationState as $location) {
                    if($location->item)
                        array_push($itemsState, $location->item);
                }
                $itemLocationCountry = ItemLocation::where('country', '=', $userLocation->country)->where('state', '!=', $userLocation->state)->with(['item' => function($query) use($otherModel){
                    $query->where('modelId', '=', $otherModel->modelId);
                }])->get();
                $itemsCountry = [];
                foreach ($itemLocationCountry as $location) {
                    if($location->item)
                        array_push($itemsCountry, $location->item);
                }

                $itemLocationWorld = ItemLocation::where('country', '!=', $userLocation->country)->with(['item' => function($query) use($otherModel){
                    $query->where('modelId', '=', $otherModel->modelId);
                }])->get();
                $itemsWorld = [];
                foreach ($itemLocationWorld as $location) {
                    if($location->item)
                        array_push($itemsWorld, $location->item);
                }

                $temp = ['id'=> $otherModel->modelId, 'name' =>$otherModel->name,'city'=>$itemsCity,'state'=>$itemsState, 'country'=> $itemsCountry, 'world'=> $itemsWorld];
                array_push($brandList, $temp);
            }
            $All = ['model'=> $modelList, 'brand' => $brandList];
            return $All;

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json();

    }


    public function storeBid(Request $request){
       try{
             if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $vendor = $user->vendor()->first();

            $bid = new Bid();
            $bid->vendorId = $vendor->vendorId;
            $bid->fill(Input::all());
            $bid->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($bid);     
    }





}
