<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PreviousExperience extends Model
{
    protected $table = "previousExperiences";
    protected $primaryKey = "previousExperienceId";
    protected $fillable = ['jobSeekerId', 'job_title', 'company', 'initial_date', 'end_date', 'is_current', 'country', 'state', 'city', 'summary'];


    public function user(){
    	$foreignKey = 'jobSeekerId';
    	return $this->hasOne('App\models\jobSeeker', $foreignKey);
    }
}

