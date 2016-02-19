<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = "productId";

    protected $fillable = ['name', 'categoryId', 'active'];

    public function category(){
    	$foreignKey = "categoryId";
    	return $this->belongsTo('App\models\Category', $foreignKey);
    }

    public function brands(){
    	$foreignKey = 'productId';
    	return $this->hasMany('App\models\Brand', $foreignKey);
    }
}
