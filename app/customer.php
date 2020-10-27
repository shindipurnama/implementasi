<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $table = 'customer';
    protected $fillable = ['ID_CUSTOMER','ID_KELURAHAN','NAMA','ALAMAT','FOTO','FILE_PATH'];
    public $timestamps = false;
}
