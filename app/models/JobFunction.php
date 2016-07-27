<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class JobFunction extends Model
{
    protected $table='job_functions';

    protected $primaryKey='jobFunctionId';

    protected $fillable=['analytics_code', 'targeting_code', 'description'];
}
