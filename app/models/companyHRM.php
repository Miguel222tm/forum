<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class companyHRM extends Model
{
    protected $table = 'company_hrm';

    protected $fillable = ['companyId', 'humanResourcesManagerId', 'code', 'confirmed'];

    public function hrManager(){
    	$foreignKey = 'humanResourcesManagerId';
    	return $this->belongsTo('HumanResourcesManager', $foreignKey);
    }

    public function company(){
    	$foreignKey = 'companyId';
    	return $this->belongsTo('Company', $foreignKey);
    }
}
