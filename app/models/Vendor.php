<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $primaryKey = 'vendorId';

    protected $fillable = ['userId','name', 'firstName', 'lastName', 'email', 'title', 'picture_url', 'unique_code', 'access_level','telephone','ext','address', 'zip_code','alternative_first_name','alternative_last_name','alternative_email','alternative_title','alternative_telephone','alternative_ext', 'website'];



    public function user(){
    	$foreignKey = 'userId';
    	return $this->belongsTo('App\User', $foreignKey);
    }

    public function products(){
    	$foreignKey = 'vendorId';
    	return $this->hasMany('App\models\VendorProduct', $foreignKey);
    }

    public function bids(){
        $foreignKey = 'vendorId';
        return $this->hasMany('App\models\Bid', $foreignKey);
    }

}
