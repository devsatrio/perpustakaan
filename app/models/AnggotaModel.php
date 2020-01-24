<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    public $timestamps = false;
    protected $table = 'anggota';
    protected $guarded = ['id'];
}
