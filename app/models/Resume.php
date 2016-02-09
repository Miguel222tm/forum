<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'jobSeekerResumes';

    protected $primaryKey = 'jobSeekerResumeId';

    protected $fillable = ['jobSeekerId', 'resume_url', 'current', 'private', 'original_name'];

}
