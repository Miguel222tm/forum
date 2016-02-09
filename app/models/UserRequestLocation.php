<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserRequestLocation extends Model
{
    protected $table ="user_request_location";

    protected $primaryKey = 'uRLocationId';

    protected $fillable = ['requestId'];
}
