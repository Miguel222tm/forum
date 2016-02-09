<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table='clubs';

    protected $primaryKey = 'clubId';

    protected $fillable = ['userId', 'creator_name', 'description'];
}
