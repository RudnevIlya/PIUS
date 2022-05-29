<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cast', function (Blueprint $table) {
            $table->id();
            $table->integer('id_film');
            $table->integer('id_actor');
            $table->string('role')->nullable();
            $table->timestamps();
            $table->foreign('id_film')->references('id')->on('film');
            $table->foreign('id_actor')->references('id')->on('actor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cast');
    }
};
