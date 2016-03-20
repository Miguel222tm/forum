<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'itemId';

    protected $fillable = ['memberId','categoryId', 'productId', 'brandId', 'modelId', 'category_name', 'product_name', 'brand_name', 'model_name', 'quantity', 'price', 'description', 'active'];

    protected $hidden = ['created_at', 'updated_at'];

    public function member(){
    	$foreignKey = 'memberId';
    	return $this->belongsTo('App\models\Member', $foreignKey);
    }

    public function location(){
    	$foreignKey = 'itemId';
    	return $this->hasMany('App\models\ItemLocation', $foreignKey);
    }

    public function bidRecord(){
        $foreignKey = 'itemId';
        return $this->hasMany('App\model\ItemBidRecord', $foreignKey);
    }

}
