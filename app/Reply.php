<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $primaryKey = 'replyId';

    protected $fillable = ['commentId','userId', 'content', 'edited', 'edited_content'];

    public function comment(){
    	$key = 'commentId';
    	return $this->belongsTo('App\models\Comment', $key);
    }

    public function user(){
    	$key = 'userId';
    	return $this->belongsTo('App\User', $key);
    }
}
