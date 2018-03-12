<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rezervasyon extends Model
{
    protected $primaryKey = 'rezervasyonlar_id';
    protected $table = 'rezervasyonlar';
    protected $dates = ['rezervasyon_tarihi'];

    protected $fillable = [
      'rezervasyonlar_id',  'rezervasyon_no','rezervasyon_adi','rezervasyon_tel','rezervasyon_tel_no','rezervasyon_oda_no','rezervasyon_kapora' , 'rezervasyon_kapora_doviz'
        ,'rezervasyon_toplam_satis','rezervasyon_toplam_satis_doviz','rezervasyon_komisyon','rezervasyon_komisyon_doviz','rezervasyon_rest','rezervasyon_rest_doviz'
        ,'rezervasyon_yetiskin_pax','rezervasyon_cocuk_pax','rezervasyon_bebek_pax','rezervasyon_ucret_pax'
        ,'otel_id','tur_id','rehber_id','alinis_id',

    ];

    public function Tur() {
        return $this->belongsTo(Tur::class,'tur_id');
    }

    public function Otel() {

        return $this->belongsTo(Otel::class, 'otel_id');
    }

    public function Alinis() {

        return $this->belongsTo(Alinis::class ,'alinis_id');
    }

    public function Cariler() {
        return $this->hasOne(Cariler::class ,'rezervasyonlar_id');
    }
}
