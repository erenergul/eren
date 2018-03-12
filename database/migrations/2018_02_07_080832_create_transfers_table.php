<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('gelen');
            $table->string('birakilis');
            $table->string('rezervasyon_tel');
            $table->smallInteger('pax');
            $table->time('time');
            $table->string('name');
            $table->integer('total');
            $table->char('doviz', 3);
            $table->integer('otel_id')->unsigned()->index();
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
        Schema::dropIfExists('transferler');
    }
}
