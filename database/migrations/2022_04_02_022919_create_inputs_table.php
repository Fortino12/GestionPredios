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
        Schema::create('inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('producto');
            $table->string('lugarElaboracion');
            $table->date('fechaElaboracion');
            $table->date('fechaCosecha');
            $table->string('volumenCosecha');
            $table->string('densidad');
            $table->string('loteAsignado');
            $table->string('funcion');
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
        Schema::dropIfExists('inputs');
    }
};
