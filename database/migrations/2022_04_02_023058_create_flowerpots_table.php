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
        Schema::create('flowerpots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreMacetero');
            $table->foreignId('plaga_id')->references('id')->on('plagues')->onDelete('cascade');
            $table->foreignId('enfermedad_id')->references('id')->on('illnesses')->onDelete('cascade');
            $table->foreignId('avanceDiario_id')->references('id')->on('daily_advances')->onDelete('cascade');
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
        Schema::dropIfExists('flowerpots');
    }
};
