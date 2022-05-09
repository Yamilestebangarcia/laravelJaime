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
        //Tabla de empresas
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('idEmpresa');
            $table->string('cif')->unique();
            $table->string('nombreComercial')->unique();
            $table->enum('tipo', ['publico', 'privado']);
            $table->string('telefono')->unique();
            $table->string('email')->unique();
            $table->string('web')->nullable();
            $table->string('actividad')->nullable();
            $table->string('horario')->nullable();
            $table->string('observaciones')->nullable();
            $table->boolean('autorizado');

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
        Schema::dropIfExists('empresas');
    }
};
