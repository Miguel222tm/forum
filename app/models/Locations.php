<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table= 'Locations';

    protected $primaryKey='locationId';

    protected $fillable= ['country_code', 'name'];
}
