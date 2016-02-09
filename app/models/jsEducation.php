<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class jsEducation extends Model
{
    protected $table = "jobSeekerEducation";

    protected $primaryKey = "jobSeekerEducationId";

    protected $fillable = ['jobSeekerId', 'school_name', 'field_of_study', 'start_date', 'end_date', 'is_current', 'degree', 'activities', 'notes'];


    public function user(){
    	$foreignKey = 'jobSeekerId';
    	return $this->hasOne('App\models\JobSeeker', $foreignKey);
    }
}
