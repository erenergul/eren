<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRezervasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezervasyonlar', function (Blueprint $table) {
            $table->increments('rezervasyonlar_id');
            $table->char('rezervasyon_no', 50);
            $table->date('rezervasyon_tarihi');
            $table->char('rezervasyon_adi', 50)->nullable();
            $table->char('rezervasyon_tel', 50)->nullable();
            $table->char('rezervasyon_oda_no', 10)->nullable();
            $table->integer('rezervasyon_toplam_satis');
            $table->char('rezervasyon_toplam_satis_doviz', 3);
            $table->integer('rezervasyon_kapora');
            $table->char('rezervasyon_kapora_doviz', 3);
            $table->integer('rezervasyon_rest');
            $table->char('rezervasyon_rest_doviz', 3);
            $table->smallInteger('rezervasyon_yetiskin_pax');
            $table->smallInteger('rezervasyon_cocuk_pax');
            $table->smallInteger('rezervasyon_bebek_pax');
            $table->smallInteger('rezervasyon_ucret_pax');
            $table->integer('otel_id')->unsigned()->index();
            $table->integer('tur_id')->unsigned()->index();
            $table->integer('rehber_id')->unsigned()->index();
            $table->integer('alinis_id')->unsigned()->index();
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
        Schema::dropIfExists('rezervasyonlar');
    }
}
