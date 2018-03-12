<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cariler extends Model
{
    protected $primaryKey = 'cari_id';
    protected $table = "cariler";

    protected $fillable = ['cari_tarihi','cari_borc','cari_alacak','cari_bakiye','otel_id','tur_id','rezervasyonlar_id','ch_id'];

    public function Turlar() {
        return $this->belongsTo('App\Tur', 'tur_id');
    }

    public function Oteller() {
        return $this->belongsTo('App\Oteller', 'otel_id');
    }

    public function Rezervasyon() {
        return $this->belongsTo('App\Rezervasyon', 'rezervasyonlar_id');
    }

    public function Cari_Hesaplar() {
        return $this->belongsTo('App\Cari_Hesaplar', 'ch_id');
    }



}
