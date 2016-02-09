<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Functionality extends Model
{
    // MASS ASSIGNMENT -----------------------------------------------------
    //Define fillable fields 
    protected $table = 'functionality';

    
	protected $fillable = ['name', 'code'];

	

	public $timestamps = false;

	public function getAccessLevel()
    {
        $foreignKey = 'functionalityId';
        $otherKey = 'accessLevelId';
        return $this->belongsToMany('AccessLevel', 'access_level_functionality', $foreignKey , $otherKey);
    }

}
