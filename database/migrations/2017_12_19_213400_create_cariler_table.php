<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cariler', function (Blueprint $table) {
            $table->increments('cari_id');
            $table->date('cari_tarihi');
            $table->float('cari_borc');
            $table->float('cari_alacak');
            $table->float('cari_bakiye');
            $table->integer('otel_id')->unsigned();
            $table->integer('tur_id')->unsigned();
            $table->integer('rezervasyonlar_id')->unsigned();
            $table->integer('ch_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cariler');
    }
}
