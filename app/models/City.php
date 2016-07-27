<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table ='cities';

    protected $primaryKey = 'cityId';

    protected $fillable = ['stateId', 'name'];

    protected $hidden = ['created_at', 'updated_at'];


    public function state(){
    	$foreignKey = 'stateId';
    	return $this->belongsTo('App\models\State', $foreignKey);
    }
}
