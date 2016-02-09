<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'jobSeekerCourses';

    protected $primaryKey = 'jobSeekerCourseId';

    protected $fillable = ['jobSeekerId', 'name', 'number', 'summary'];
    
}
