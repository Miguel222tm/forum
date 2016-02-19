<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = "model";

    protected $primaryKey = 'modelId';

    protected $fillable = ['name', 'brandId', 'description', 'date_of_creation', 'active'];

    public function brand(){
    	$foreignKey = 'brandId';
    	return $this->belongsTo('App\models\Brand', $foreignKey);
    }
}
