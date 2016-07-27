<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $table = 'userRequest';

    protected $primaryKey = 'requestId';

    protected $fillable = ['memberId','categoryId', 'productId', 'brandId', 'modelId', 'category_name', 'product_name', 'brand_name', 'model_name', 'quantity', 'price', 'description', 'active'];

    
}
