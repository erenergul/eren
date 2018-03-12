<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rehber extends Model
{
    protected $table = "rehberler";
    protected $primaryKey = 'rehber_id';
    protected $fillable = ['rehber_adi'];


    public function Rezervasyon() {

        return $this->hasMany(Rezervasyon::class);
    }

}
