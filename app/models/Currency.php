<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table='Currency_codes';
    
    protected $primaryKey='currencyCodeId';
    
    protected $fillable=['code', 'country', 'currency_name'];

    
}
