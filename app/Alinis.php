<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alinis extends Model
{
    protected $table = "alinislar";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'tur_id'];

    public function Tur()
    {
        return $this->belongsTo(Tur::class, 'tur_id');
    }

    public function alinislar()
    {
        return $this->belongsTo(Rezervasyon::class);
    }

    public function Rezervasyon() {

        return $this->hasMany(Rezervasyon::class);
    }

}
