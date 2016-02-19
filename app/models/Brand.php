<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    protected $primaryKey = 'brandId';

    protected $fillable = ['name', 'productId', 'active'];


    public function product(){
    	$foreignKey = 'productId';
    	return $this->belongsTo('App\models\Product', $foreignKey);
    }

    public function models(){
    	$foreignKey = 'brandId';
    	return $this->hasMany('App\models\Modelo', $foreignKey);
    }
}
