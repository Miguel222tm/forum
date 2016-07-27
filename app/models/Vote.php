<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $primaryKey = 'voteId';

    protected $fillable = ['userId', 'type', 'typeId'];


    public function post(){

    }

    public function comment(){
    	
    }


}
