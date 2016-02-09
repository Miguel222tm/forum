<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'Companies';
    protected $primaryKey = 'companyId';

    protected $fillable = ['userId', 'name','firstName','lastName','email','second_email','phone','celullar', 'date_of_birth','picture_url','company_code', 'companyName', 'universal_name', 'email_domains', 'company_type', 'ticker', 'website_url', 'status', 'logo_url', 'square_logo_url', 'blog_url', 'twitter_id', 'facebook_id','instagram_id', 'employee-count-range', 'specialities', 'description', 'founded_year', 'end_year', 'num_followers', 'stock_exchange', 'access_level'];


    protected $hidden = ['updated_at', 'created_at'];

    public function user(){
    	$foreignKey='userId';
    	return $this->belongsTo('User',$foreignKey);
    }

    public function hrManagers(){
    	$foreignKey = 'companyId';
    	return $this->hasMany('companyHRM', $foreignKey);
    }

}
