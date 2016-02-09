<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CompanySizes extends Model
{
    //
     protected $table='company_sizes';

    protected $primaryKey= 'companySizeId';

    protected $fillable = ['code', 'description'];
}
