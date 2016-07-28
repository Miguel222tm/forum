<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'commentId';

    protected $fillable = ['postId', 'userId', 'isParent', 'parentId', 'content', 'edited', 'edited_content'];


    public function post(){
    	$foreignKey = 'postId';
    	return $this->belongsTo('App\models\Post', $foreignKey);
    }

    public function replies(){
    	$foreignKey = 'commentId';
    	return $this->hasMany('App\Reply', $foreignKey);
    }

    public function user(){
    	$foreignKey = 'userId';
    	return $this->belongsTo('App\User', $foreignKey);
    }

}
