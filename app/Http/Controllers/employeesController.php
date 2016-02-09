<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Employee;
use App\User;
use Input;
class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $Employee = Employee::all();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Employee);
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
            $Employee = new Employee();
            $Employee->fill(Input::all());
            $Employee->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Employee);
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
            $Employee = Employee::findOrFail($id);
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Employee);
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
            $Employee = Employee::findOrFail($id);
            $Employee->fill(Input::all());
            $Employee->save();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Employee);
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
            $Employee = Employee::findOrFail($id);
            $user = User::findOrFail($js->userId);
            $user->delete();
            $Employee->delete();

        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($Employee);
    }
}
