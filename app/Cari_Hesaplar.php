<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cari_Hesaplar extends Model
{
    protected $primaryKey = 'ch_id';
    protected $table = "cari_hesaplar";

    protected $fillable = [ 'ch_adi', 'ch_doviz' ];
}
