<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    protected $primaryKey = 'rateId';

    protected $fillable = ['userId', 'rate', 'memberId', 'vendorId'];



   	public function user(){
   		$foreignKey = 'userId';
   		return $this->belongsTo('App\User', $foreignKey);
   	}
}
