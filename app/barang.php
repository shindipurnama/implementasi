<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    //
    protected $table = 'barang';
    protected $fillable = ['id_barang','nama','timestamp'];
    public $timestamps = false;
}
