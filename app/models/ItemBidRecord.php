<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ItemBidRecord extends Model
{
    protected $table = 'item_bid';

    protected $primaryKey = 'itemBidId';

    protected $fillable = ['itemId', 'bidId'];


    public function item(){
    	$foreignKey = 'itemId';
    	return $this->belongsTo('App\models\Item', $foreignKey);
    }

    public function bid(){
    	$foreignKey = 'bidId';
    	return $this->belongsTo('App\models\Bid', $foreignKey);
    }
}
