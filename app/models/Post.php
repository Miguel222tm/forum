<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'postId';

    protected $fillable = ['categoryId', 'title', 'content', 'isParent', 'parentId', 'type'];


    public function category(){
    	$foreignKey = 'categoryId';
    	return $this->belongsTo('App\models\Category', $foreignKey);
    }

    public function comments(){
    	$foreignKey = 'postId';
    	return $this->hasMany('App\models\Comment', $foreignKey);
    }

    public function votes(){
    	$foreignKey = 'postId';
    	return $this->hasMany('App\models\Vote', $foreignKey, 'typeId');
    }
    
}
