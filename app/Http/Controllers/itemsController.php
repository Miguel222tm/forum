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
use App\models\Bid;
use App\models\ItemBidRecord;
use App\models\VendorProduct;
use Mail;
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
            //return $item;
            $item->save();


            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            

            if(Input::all()['location']){
                $itemLocation = new ItemLocation();
                $itemLocation->itemId = $item->itemId;
                $itemLocation->country = Input::all()['location']['country'];
                $itemLocation->state = Input::all()['location']['state'];
                $itemLocation->city = Input::all()['location']['city'];
                $itemLocation->save();
            }else{
                //your current location
                $userLocation = $user->location()->first();
                $itemLocation = new ItemLocation();
                $itemLocation->itemId = $item->itemId;
                $itemLocation->country = $userLocation->country;
                $itemLocation->state = $userLocation->state;
                $itemLocation->city = $userLocation->city;
                
                $itemLocation->save();
            }

            $item->location = $item->location()->get();

            //send email to vendors and other members
            $allItems = array();
            $brand = Item::where('notification_brand', '=', true)->where('brandId', '=', $item->brandId)->with('member')->get();
            foreach ($brand as $bra) {
                array_push($allItems, $bra->member->email);
            }
            $model = Item::where('notification_model', '=', true)->where('modelId', '=', $item->modelId)->with('member')->get();
            foreach ($model as $mo) {
                array_push($allItems, $mo->member->email);
            }
            $preMembers = array_unique($allItems);
            $members = array();
            foreach ($preMembers as $member) {
                if($member != $user->email){
                    array_push($members, $member);
                }
            }
            //return $members;

            $allProducts = VendorProduct::where('categoryId', '=', $item->categoryId)->with('vendor')->get();
            $preVendors = array();
            foreach ($allProducts as $product) {
                array_push($preVendors, $product->vendor->email);
            }
            $vendors = array_unique($preVendors);
            if($vendors){
                foreach ($vendors as $vendor) {
                    $sent = Mail::send('emails.vendor-alert', array('key' => ''), function($message) use($vendor)
                    {
                        $message->from('membership.relations@clubmein.com');
                        // $message->embed('/images/default_picture.png');
                        $message->to($vendor, 'Vendor')->subject('Members interested in your products');
                    });

                    if($sent){
                        //return response()->json('email sent', 200);      
                    }     
                }
            }
            if($members){
                foreach ($members as $member) {
                    $sent = Mail::send('emails.member-alert', array('key' => ''), function($message) use($member)
                    {
                        $message->from('membership.relations@clubmein.com');
                        $message->to($member, 'Member')->subject('Members interested in the same brands as you!');
                    });

                    if($sent){
                        //return response()->json('email sent', 200);      
                    }  
                }
            }
            

            
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
            if($locations){
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

    public function showBids($id){
        try{
            $item = Item::find($id);
            $modelBids = Bid::where('modelId', '=', $item->modelId)->get();


        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($modelBids);
    }

    public function storeBidRecord($id){
        try{
            $bidRecord = ItemBidRecord::where('itemId', '=', $id)->where('bidId', '=', Input::all()[0])->get();
            //return sizeof($bidRecord);
            if(sizeof($bidRecord) === 0){
                //return Input::all()[0];
                $ItemBidRecord = ItemBidRecord::create(['itemId'=>$id, 'bidId'=> Input::all()[0]]);
            }else{
                return response()->json($bidRecord);
            }
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($ItemBidRecord);
    }
}
