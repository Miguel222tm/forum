<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="countries";

    protected $primaryKey = 'countryId';

    protected $fillable  = ['code','name'];

    protected $hidden = ['created_at', 'updated_at'];


    public function states() {
    	$foreignKey = 'countryId';
    	return $this->hasMany('App\models\State', $foreignKey);
    }
}
