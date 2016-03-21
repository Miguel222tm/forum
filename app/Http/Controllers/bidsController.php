<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\models\Bid;
use App\models\VendorProduct;
use App\models\Rate;
class bidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            $bid = new Bid();
            $bid->vendorId = $vendor->vendorId;
            $bid->fill(Input::all());
            $bid->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($bid);
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
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $member = $user->member()->first();
            $bid = Bid::where('bidId','=',$id)->with(['vendor' => function($query){
                $query->with('user');
            }])->first();

            $bid->vendor->user->location = $bid->vendor->user->location()->first();
            $bid->vendor->user->rates = Rate::where('userId', '=', $bid->vendor->user->userId)->get();
            $bid->rate = Rate::where('userId', '=', $bid->vendor->user->userId)->where('memberId','=', $member->memberId)->first();
            $bid->vendor->products = VendorProduct::where('vendorId', '=', $bid->vendor->vendorId)->get();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($bid);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
