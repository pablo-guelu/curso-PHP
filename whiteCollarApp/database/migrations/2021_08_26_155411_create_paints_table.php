<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paints', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->dateTime('entry', $precision = 0);
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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
        Schema::dropIfExists('paints');
    }
}
