<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	protected $table = 'users';
    protected $fillable = [
        'name', 'username','email', 'password','alamat','notelp','foto'
    ];

    
    protected $hidden = [
        'password',
    ];
}
