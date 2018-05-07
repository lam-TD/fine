<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\User as AuthenticableTrait;

class usersModel extends Authenticatable
{
	use Notifiable;
    protected $table = 'vnt_user';
    protected $fillable=[
    	'id','username','password','social_login_id'
    ];
}
