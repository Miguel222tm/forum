<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'categoryId';

    protected $fillable = ['name', 'code', 'active'];



    public function product(){
    	$foreignKey = 'categoryId';
    	return $this->hasMany('App\models\Product', $foreignKey);
    }
}