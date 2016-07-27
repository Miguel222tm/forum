<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'commentId';

    protected $fillable = ['postId', 'userId', 'isParent', 'parentId'];


    public function post(){
    	$foreignKey = 'postId';
    	return $this->belongsTo('App\models\Post', $foreignKey);
    }

}
