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
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->date('fecha');
            $table->string('descripcion');
            $table->string('ciudad');
            $table->string('direccion');
            $table->integer('aforomax');
            $table->string('tipo');
            $table->integer('nummaxentradas');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('asistente_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('asistente_id')->references('id')->on('asistentes');
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
        Schema::dropIfExists('eventos');
    }
};
