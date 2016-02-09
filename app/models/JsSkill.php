<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class JsSkill extends Model
{
    protected $table = 'jobSeekerSkills';

    protected $primaryKey = 'jobSeekerSkillId';

    protected $fillable = ['jobSeekerId', 'skillId', 'tag_name'];
}
