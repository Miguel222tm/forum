<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = "fee_code";

    protected $primaryKey = "feeId";

    protected $fillable = ['code', 'name', 'description','from','to','percentage', 'default', 'active'];

}
