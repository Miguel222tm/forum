<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $primaryKey = 'vendorId';

    protected $fillable = ['name', 'firstName', 'lastName', 'email', 'second_email', 'picture_url', 'unique_code', 'access_level', 'website'];

}
