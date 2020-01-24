<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class kategoriModel extends Model
{
    public $timestamps = false;
    protected $table = 'kategori_buku';
    protected $guarded = ['id'];
}
