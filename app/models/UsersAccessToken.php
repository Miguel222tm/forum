<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UsersAccessToken extends Model
{
	protected $table = 'users_access_tokens';
        
    protected $fillable = ['usersId', 'tokenSource', 'access_token', 'expires_in'];
        
    protected $primaryKey = 'userAccessTokensId';

    public $timestamps = false;
    // DEFINE RELATIONSHIPS ------------------------------------------------
        
    public function user() {
        $foreignKey = 'userId';
        return $this->belongsTo('User', $foreignKey);
    }    


}
