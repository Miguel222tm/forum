<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ItemLocation extends Model
{
    protected $table='item_location';

    protected $primaryKey = 'itemLocationId';

    protected $fillable = ['itemId', 'countryId', 'stateId', 'cityId'];

    public function item(){
    	$foreignKey = 'itemId';
    	return $this->belongsTo('App\models\Item', $foreignKey);
    }

   
}
