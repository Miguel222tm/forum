<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Item;
use Input;
use App\models\ItemLocation;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            if(Input::has('active') && Input::all()['active'] === "false"){
             $items = Item::where('active', '=', false)->get();
            }else{
                $items = Item::all();
            }

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            //return Input::all()['location'];
            $item = new Item();
            $item->fill(Input::all());
            $item->save();


            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $userLocation = $user->location()->first();

            $itemLocation = new ItemLocation();
            $itemLocation->itemId = $item->itemId;
            $itemLocation->country = $userLocation->country;
            $itemLocation->state = $userLocation->state;
            $itemLocation->city = $userLocation->city;
            
            $itemLocation->save();

            if(isset(Input::all()['location'])){
                $itemLocation = new ItemLocation();
                $itemLocation->itemId = $item->itemId;
                $itemLocation->country = Input::all()['location']['country'];
                $itemLocation->state = Input::all()['location']['state'];
                $itemLocation->city = Input::all()['location']['city'];
                $itemLocation->save();
            }

            $item->location = $item->location()->get();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($item);
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
            $item = Item::find($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($item);
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
            $item = Item::find($id);
            $item->fill(Input::all());
            $item->save();

            if(isset(Input::all()['modifyLocation'])){
                $itemLocation = ItemLocation::find(Input::all()['modifyLocation']['itemLocationId']);
                
                $itemLocation->country = Input::all()['modifyLocation']['country'];
                $itemLocation->state = Input::all()['modifyLocation']['state'];
                $itemLocation->city = Input::all()['modifyLocation']['city'];
                $itemLocation->save();
            }
            $item->location = $item->location()->get();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($item);
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
            $item = Item::find($id);
            $locations = $item->location()->get();
            if(isset($locations)){
                foreach ($locations as $location) {
                    $location->delete();
                }
            }
            $item->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($item);
    }
}
