<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\models\Post;
use Input;
class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $buildQuery = [];
            $posts = new Post();
            $posts = $posts->with($buildQuery);
            $posts = $this->buildQuery($posts);
            // return Input::all();
            if(Input::has('type') && Input::all()['type']){
                $posts = $posts->where('type', '=', Input::all()['type']);
            }
            // $posts = Post::all();
                
            $posts = $posts->orderBy('created_at','desc')->get();


        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($posts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // retu//rn $request->all();
            $post = new Post();
            $post->fill($request->all());
            $post->save();
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = Post::with(['comments' => function($query){
                $query->with(['replies' =>function($query){
                    $query->orderBy('created_at', 'desc');
                    $query->with('user');
                }]);
                $query->with('user');
                $query->orderBy('created_at', 'desc');
            }])->findOrFail($id);
        } catch (Exception $e) {
            return response()->json($e);
        }
        return response()->json($post);
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
