<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    protected $table= 'states';

    protected $primaryKey = 'stateId';

    protected $fillable = ['countryId', 'name'];


    public function country(){
    	$foreignKey = 'countryId';
    	return $this->belongsTo('App\models\Country', $foreignKey);
    }

    public function cities(){
    	$foreignKey = 'stateId';
    	return $this->hasMany('App\models\City', $foreignKey);
    }
}
