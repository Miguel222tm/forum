<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'vendor_bids';

    protected $primaryKey = 'bidId';

    protected $fillable = ['vendorId', 'type','brandId', 'modelId', 'brand_name', 'model_name', 'total_items', 'min_price', 'max_price', 'average_price', 'offer'];

    public function vendor(){
    	$foreignKey = 'vendorId';
    	return $this->belongsTo('App\models\Vendor', $foreignKey);
    }

    public function location(){
    	$foreignKey = 'bidId';
    	return $this->hasMany('App\models\BidLocation', $foreignKey);
    }

    public function bidRecord(){
        $foreignKey = 'bidId';
        return $this->hasMany('App\models\ItemBidRecord', $foreignKey);
    }
}
