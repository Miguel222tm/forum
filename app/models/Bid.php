<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'vendor_bids';

    protected $primaryKey = 'bidId';

    protected $fillable = ['vendorId', 'type', 'categoryId', 'productId','brandId', 'modelId', 'category_name', 'product_name', 'brand_name', 'model_name'];


    public function vendor(){
    	$foreignKey = 'vendorId';
    	return $this->belongsTo('App\models\Vendor', $foreignKey);
    }

    public function location(){
    	$foreignKey = 'bidId';
    	return $this->hasMany('App\models\BidLocation', $foreignKey);
    }
}
