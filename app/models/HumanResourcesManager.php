<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HumanResourcesManager extends Model
{
    protected $table = 'HumanResourcesManagers';

    protected $primaryKey = 'humanResourcesManagerId';

    protected $fillable = ['userId', 'title', 'name', 'firstName', 'lastName', 'email', 'second_email', 'picture_url', 'phone','celullar', 'access_level', 'companyId' , 'date_of_birth'];

    public function user(){
    	$foreignKey='userId';
    	return $this->belongsTo('User', $foreignKey);
    }

    public function companies(){
    	$foreignKey = 'humanResourcesManagerId';
    	return $this->hasMany('companyHRM', $foreignKey);
    }
}
