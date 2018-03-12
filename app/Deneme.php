<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deneme extends Model
{
    protected $table = "denemeler";

    protected $dates = ["tarih"];
}
