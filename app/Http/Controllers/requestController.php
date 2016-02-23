<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\UserRequest;
use Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\models\UserRequestLocation;
class requestController extends Controller
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
            $req = new UserRequest();
            $req->fill(Input::all());
            $req->save();

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $userLocation = $user->location()->first();

            $requestLocation = new UserRequestLocation();
            $requestLocation->requestId = $req->requestId;
            $requestLocation->country = $userLocation->country;
            $requestLocation->state = $userLocation->state;
            $requestLocation->city = $userLocation->city;
            $requestLocation->save();

            if(isset(Input::all()['location'])){
                $UserRequestLocation = new UserRequestLocation();
                $UserRequestLocation->requestId = $req->requestId;
                $UserRequestLocation->country = Input::all()['location']['country'];
                $UserRequestLocation->state = Input::all()['location']['state'];
                $UserRequestLocation->city = Input::all()['location']['city'];
                $UserRequestLocation->save();
            }
            $req->location = $req->location()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($req);
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
