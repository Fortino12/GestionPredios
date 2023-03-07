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
        Schema::create('daily_advances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreAvance');
            $table->string('seccion');
            $table->date('fecha');
            $table->foreignId('actividad_id')->references('id')->on('activities')->onDelete('cascade');
            $table->double('totalSemanal')->nullable();
            $table->double('porceSemanal')->nullable();
            $table->double('porceSemanalPrevio')->nullable();
            $table->double('porceAcumulado')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('daily_advances');
    }
};
