<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odemeler extends Model
{
    protected $primaryKey = 'odeme_id';
    protected $table = "odemeler";

    protected $fillable = [  'odeme_turu','odeme_aciklama','odeme_tutar','odeme_doviz','odeme_tarihi','ch_id'];

    public function Cari_Hesaplar() {
        return $this->belongsTo('App\Cari_Hesaplar', 'ch_id');
    }

}
