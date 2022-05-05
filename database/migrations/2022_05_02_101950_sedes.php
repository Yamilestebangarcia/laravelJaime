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
        //Tabla de representantes
        Schema::create('sedes', function (Blueprint $table) {
            $table->bigIncrements('idSede');
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idEmpresa')
                ->references('idEmpresa')
                ->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nombreSede')->unique();
            $table->string('direccion'); //calle y número
            $table->string('codPostal');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('correo')->unique();
            $table->string('telefono')->unique();
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
        Schema::dropIfExists('sedes');
    }
};
