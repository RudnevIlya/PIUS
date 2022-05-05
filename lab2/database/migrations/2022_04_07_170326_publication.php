<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('token');
            $table->text('content')->nullable();
            //$table->timestamp('created_datetime')->nullable();
            $table->timestamps();
            $table->string('author')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication');
    }
};
