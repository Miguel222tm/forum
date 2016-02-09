<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $table = 'userRequest';

    protected $primaryKey = 'requestId';

    protected $fillable = [''];
}
