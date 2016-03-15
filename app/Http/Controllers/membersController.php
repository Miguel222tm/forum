<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Member;
use App\User;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class membersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $member = Member::with('user')->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($member);
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
            $member = new Member();
            $member->fill(Input::all());
            $member->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($member);
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
            $member = Member::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($member);
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
            $member = Member::findOrFail($id);
            $member->fill(Input::all());
            $member->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($member);
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
            $member = Member::findOrFail($id);
            $user = User::findOrFail($js->userId);
            $user->delete();
            $member->delete();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($member);
    }

    public function profile(){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found', 404]);
            }
            $member = $user->member()->firstOrFail();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($member);
    }

    public function items(){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found', 404]);
            }
            $member = $user->member()->firstOrFail();
            $items = $member->items()->get();

            if(isset($items)){
                foreach ($items as $item) {
                    $item['location'] = $item->location()->get();
                }
            }

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($items);
    }

    
}
