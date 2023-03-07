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
        Schema::create('enforcements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->date('fechaAplicacion');
            $table->string('nombreComercial');
            $table->string('noRegistro');
            $table->string('noLote');
            $table->string('toxicologia');
            $table->string('ingrediente');
            $table->string('dosis');
            $table->string('plagaoEnfermedad')->nullable();
            $table->string('nutricion')->nullable();
            $table->foreignId('responsable')->references('id')->on('users')->onDelete('cascade');
            $table->integer('autorizo')->nullable();
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
        Schema::dropIfExists('enforcements');
    }
};
