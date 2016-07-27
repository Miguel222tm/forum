<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    protected $fillable = [];

	protected $table = "access_level";


	public function user()
	{
		$foreignKey = 'accessLevelId';
		return $this->hasOne("User", $foreignKey);
	}

    public function getFunctionality()
    {
        $foreignKey = 'accessLevelId';
        $otherKey = 'functionalityId';
        return $this->belongsToMany('App\models\Functionality', 'access_level_functionality', $foreignKey , $otherKey);
    }

    public function addFunctionalities($functionality)
    {
    	$this->getFunctionality()->attach($functionality);
    	return $this->getFunctionality()->get();
    }
}
