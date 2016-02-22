<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table="members";

    protected $primaryKey = 'memberId';

    protected $fillable = ['userId','name', 'firstName','lastName', 'email', 'picture_url', 'unique_code', 'access_level', 'rating'];

    protected $hidden = ['created_at', 'updated_at', 'userId'];

    public function user(){
    	$foreignKey='userId';
    	return $this->belongsTo('App\User', $foreignKey);
    }

    public function items(){
    	$foreignKey = 'memberId';
    	return $this->hasMany('App\models\Item', $foreignKey);
    }

    
}
