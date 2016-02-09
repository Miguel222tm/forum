<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    
    protected $table='Industries';

    protected $primaryKey='industryId';

    protected $fillable=['code','groups', 'description'];
}
