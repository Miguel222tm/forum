<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey='userId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','firstName', 'lastName', 'email','picture_url','password', 'remember_token', 'active', 'type', 'googleId', 'facebookId', 'linkedInId'];

    /**
     * The attributes excluded from the model's JSON form.11
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];

    public function userAccessTokens() {
        $foreignKey = 'userId';
        return $this->hasMany('UserAccessToken', $foreignKey);
    }

    public function jobSeeker() {
        $foreignKey = "userId";
        return $this->hasOne('App\models\JobSeeker', $foreignKey);
    }

    public function humanResourcesManager() {
        $foreignKey='userId';
        return $this->hasOne('App\models\HumanResourcesManager', $foreignKey);
    }

    public function company() {
        $foreignKey='userId';
        return $this->hasOne('App\models\Company',$foreignKey);
    }

    

}
