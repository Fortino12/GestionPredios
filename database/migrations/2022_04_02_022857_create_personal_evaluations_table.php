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
        Schema::create('personal_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('trabajador_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreignId('actividad_id')->references('id')->on('activities')->onDelete('cascade');
            $table->double('metaEstablecido')->nullable();
            $table->double('metaAlcanzada')->nullable();
            $table->string('inspeccion')->nullable();
            $table->double('calificacion')->nullable();
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
        Schema::dropIfExists('personal_evaluations');
    }
};
