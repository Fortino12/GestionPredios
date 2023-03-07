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
        Schema::create('plagues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('predio_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreignId('jornal')->references('id')->on('wages')->onDelete('cascade');
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->string('superficie');
            $table->string('cultivo');
            $table->string('estadoTecnologico');
            $table->string('nombrePlaga');
            $table->string('puntoMuestra');
            $table->string('nombreEnfermedad');
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
        Schema::dropIfExists('plagues');
    }
};
