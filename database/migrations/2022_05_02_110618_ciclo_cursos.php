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
        Schema::create('cicloCursos', function (Blueprint $table) {
            $table->bigIncrements('idCicloCurso');
            $table->string('ciclo');
            $table->enum('curso', ['1', '2']);
            $table->string('nombre');
            $table->enum('modalidad', ['presencial', 'semipresencial', 'online']);
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
        //
        Schema::dropIfExists('cicloCursos');
    }
};
