<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Otel extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name'];
    protected $table = "oteller";
    protected $primaryKey = 'id';
    protected $fillable = ['name'];



    public function Rezervasyon() {

        return $this->hasMany(Rezervasyon::class);
    }

    public function Transfer() {

        return $this->hasMany(Transfer::class);
    }

}
