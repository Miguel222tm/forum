<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Seniority extends Model
{
    protected $table='Seniority';

    protected $primaryKey='seniorityId';

    protected $fillable=['analytics_code', 'targeting_code', 'description'];
    
}
