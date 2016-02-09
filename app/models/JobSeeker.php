<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    protected $table= 'job_seekers';

    protected $primaryKey='jobSeekerId';

    protected $fillable = ['userId','nickname', 'name', 'firstName', 'lastName', 'email', 'second_email', 'date_of_birth', 'headline','phone', 'celullar', 'job_preference', 'original_picture_url', 'picture_url', 'public_profile_url', 'linkedin_public_profile_url', 'specialities', 'summary', 'num-connections', 'num-connections-capped', 'access_level', 'available_for_hire'];

    protected $hidden = ['created_at', 'updated_at', 'userId'];

    public function user(){
    	$foreignKey='userId';
    	return $this->belongsTo('App\User', $foreignKey);
    }

    public function resumes(){
        $foreignKey = 'jobSeekerId';
        return $this->hasMany('App\models\Resume', $foreignKey);
    }
    public function education(){
    	$foreignKey = 'jobSeekerId';
    	return $this->hasMany('App\models\jsEducation', $foreignKey);
    }

    public function languages(){
        $foreignKey  = 'jobSeekerId';
        return $this->hasMany('App\models\jsLanguages', $foreignKey);
    }

    public function previousExperience(){
        $foreignKey = 'jobSeekerId';
        return $this->hasMany('App\models\PreviousExperience', $foreignKey);
    }

    public function certificates(){
        $foreignKey = 'jobSeekerId';
        return $this->hasMany('App\models\Certificates', $foreignKey);
    }

    public function courses(){
        $foreignKey = 'jobSeekerId';
        return $this->hasMany('App\models\Courses',$foreignKey);
    }

    public function volunteers(){
        $foreignKey = 'jobSeekerId';
        return $this->hasMany('App\models\Volunteers',$foreignKey);
    }

    public function skills(){
        $foreignKey = 'jobSeekerId';
        return $this->hasMany('App\models\jsSkill', $foreignKey);
    }
    //$js = App\models\jobSeeker::find(1);
}
