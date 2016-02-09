<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    protected $table = 'jobSeekerVolunteers';

    protected $primaryKey = 'jobSeekerVolunteerId';

    protected $fillable = ['jobSeekerId', 'role', 'organization_name', 'cause'];
}
