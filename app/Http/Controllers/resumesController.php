<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\models\Resume;
use Input;
use DB;
class resumesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $resumes = $js->resumes()->get();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($resumes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('current', 'private');
      
        try{
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $resumes = $js->resumes()->get();

            if(sizeof($resumes) < 3){
                $newResume = new Resume;
                $newResume->jobSeekerId = $js->jobSeekerId;
                /*===================================
                =            file upload            =
                ===================================*/
                $filename = $_FILES['file']['name'];

                if($_FILES['file']['type'] === 'application/pdf'){
                    if (!file_exists('uploads/jobSeekers/'.$js->email.'/resumes')) {
                        mkdir('uploads/jobSeekers/'.$js->email.'/resumes', 0777, true);
                    }
                    $destination = 'uploads/jobSeekers/'.$js->email.'/resumes/' . str_random(10). $filename;
                    move_uploaded_file( $_FILES['file']['tmp_name'] , $destination );        
                
                    $newResume->resume_url = $destination;
                    $newResume->original_name = $filename;
                    $newResume->current = $credentials['current'];
                    $newResume->private = $credentials['private'];
                    $newResume->save();
                    return response()->json($newResume);
                }
            /*=====  End of file upload  ======*/
            }else{
                return response()->json(['you cant add another resume', 500]);
            }
            
        }catch(Exception $ex){
            return response()->json($ex);
        }
        
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
            $js = $user->jobSeeker()->firstOrFail();
            $resumes = $js->resumes()->where('jobSeekerResumeId',$id)->firstOrFail();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($resumes);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        $input = Input::all();
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
            $js = $user->jobSeeker->firstOrFail();
            if(!$input['individual']){
                foreach ($input['resumes'] as $key => $value) {
                   $resume = $js->resumes()->where('jobSeekerResumeId', $value['jobSeekerResumeId'])->firstOrFail();
                    $resume->fill($value);
                    $resume->save();
                }
            }else{
                $resume = $js->resumes()->where('jobSeekerResumeId', $input['resumes']['jobSeekerResumeId'])->firstOrFail();
                $resume->fill($input['resumes']);
                $resume->save();
            }
            DB::commit();
            $resumes = $js->resumes()->get();
        }catch(Exception $ex){
            return response()->json($ex);
            DB::rollback();
        }
        return response()->json($resumes);
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
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found',404]);
            }
            $js = $user->jobSeeker()->firstOrFail();
            $resume = $js->resumes()->where('jobSeekerResumeId', $id)->firstOrFail();
            
            if (file_exists($resume->resume_url)) {
                unlink($resume->resume_url);
            }
            $resume->delete();
        }catch(Exception $ex){
            return response()->json($ex);
        }
        return response()->json($resume);
    }

}
