<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'categoryId';

    protected $fillable = ['name', 'code', 'active'];



    public function posts(){
    	$foreignKey = 'categoryId';
    	return $this->hasMany('App\models\Post', $foreignKey);
    }

    public function tags()
    {
        $foreignKey = 'categoryId';
        $otherKey = 'tagId';
        return $this->belongsToMany('App\models\Tag', 'category_tag', $foreignKey , $otherKey);
    }

    public function addTags($tags)
    {
    	$this->tags()->attach($tags);
    	return $this->tags()->get();
    }

    
}
