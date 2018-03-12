<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdemelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odemeler', function (Blueprint $table) {
            $table->increments('odeme_id');
            $table->boolean('odeme_turu');
            $table->char('odeme_aciklama', 50);
            $table->float('odeme_tutar');
            $table->float('odeme_tutar_cari');
            $table->char('odeme_doviz', 3);
            $table->date('odeme_tarihi');
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
        Schema::dropIfExists('odemeler');
    }
}
