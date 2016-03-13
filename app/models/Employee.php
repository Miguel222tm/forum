<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table ='employees';

    protected  $primaryKey = 'employeeId';

    protected $fillable = ['userId','name', 'firstName', 'lastName', 'email', 'gender', 'picture_url', 'unique_code', 'access_level'];
    


    public function user(){
    	$foreignKey = 'userId';
    	return $this->belongsTo('App\User', $foreignKey);
    }


}
