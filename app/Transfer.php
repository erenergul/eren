<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $primaryKey = 'id';
    protected $table = "transferler";

    protected $fillable = [
        'id','date','name','time','gelen','birakilis','rezervasyon_tel','pax','total','doviz','otel_id'

    ];


    public function Otel() {

        return $this->belongsTo(Otel::class, 'otel_id');
    }


}
