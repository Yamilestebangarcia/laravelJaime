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
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('cif')->unique();
            $table->string('idUser')->unique();
            $table->string('nombre');
            $table->string('tipo')->nullable();
            $table->string('telefono');
            $table->string("web")->nullable();
            $table->string("actividad")->nullable();
            $table->string("horario")->nullable();
            $table->text("observaciones")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
};
