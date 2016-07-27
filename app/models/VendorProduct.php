<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    protected $table = 'vendor_products';

    protected $primaryKey = 'vendorProductId';

    protected $fillable = ['vendorId','categoryId', 'productId', 'brandId', 'modelId', 'category_name', 'product_name', 'brand_name', 'model_name', 'active'];


    public function vendor(){
    	$foreignKey ='vendorId';
    	return $this->belongsTo('App\models\Vendor', $foreignKey);
    }
    
}
