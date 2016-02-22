<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $table = 'userLocation';

    protected $primaryKey = 'userLocationId';

    protected $fillable = ['userId', 'country', 'state', 'city'];


}
