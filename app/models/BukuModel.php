<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    public $timestamps = false;
    protected $table = 'buku';
    protected $guarded = ['id'];
}
