<?php

namespace App\models;


use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AnggotaModel extends Authenticatable
{
    use Notifiable;

    protected $guard = 'anggota';
    public $timestamps = false;
    protected $table = 'anggota';
    protected $fillable = [
        'nama', 'username', 'alamat','gambar','notelp','status_anggota','password',
    ];
    protected $guarded = ['id'];
    protected $hidden = [

        'password', 'remember_token',

    ];
}
