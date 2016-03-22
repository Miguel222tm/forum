<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\models\Rate;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class rateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            $member = $user->member()->first();
            if(is_array(Input::all())){
                
                foreach (Input::all() as $element){
                    //return $element;
                    $rate = Rate::where('userId','=',$element['userId'])->where('memberId', '=', $member->memberId)->first();
                    if($rate){
                        $rate->fill($element);
                        $rate->save();
                    }else{
                        $rate = new Rate();
                        $rate->fill($element);
                        $rate->memberId = $member->memberId;
                        $rate->save();
                    }
                }
            }
            else{
                
                
                $rate = new Rate();
                $rate->fill(Input::all());
                $rate->memberId = $member->memberId;
                $rate->save();
            }
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json(['response'=>'Ok', 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $rate = Rate::find($id);
            $rate->fill(Input::all());
            $rate->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($rate);
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
