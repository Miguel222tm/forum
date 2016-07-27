<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TypeOfUser extends Model
{
    protected $table ="typeOfUsers";

    protected $primaryKey ='typeId';

    protected $fillable = ['code','description'];


   	public function user(){
    	$foreignKey='userId';
    	return $this->belongsTo('User', $foreignKey);
    }
}
