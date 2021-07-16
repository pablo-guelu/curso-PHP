<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('equipo_local');
            $table->string('equipo_visita');
            $table->dateTime('fecha', $precision = 0);
            $table->string('lugar');
            $table->boolean('terminado')->nullable();
            $table->integer('goles_local')->nullable();
            $table->integer('goles_visita')->nullable();
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
        Schema::dropIfExists('partidos');
    }
}
