<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tur extends Model
{
    protected $table = "turlar";
    protected $primaryKey = 'id';
    protected $fillable = ['name'];


    public function Alinis()
    {
        return $this->hasMany(Alinis::class);
    }

    public function Rezervasyon() {
        return $this->hasMany(Rezervasyon::class);
    }

}
