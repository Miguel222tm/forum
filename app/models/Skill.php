<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    
    protected $table = 'Skills';

    protected $primaryKey = 'skillId';

    protected $fillable = ['tag_name'];
}
