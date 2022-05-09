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
        Schema::create('tutoresLaborales', function (Blueprint $table) {
            $table->bigIncrements('idTutorLaboral');
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idEmpresa')
                ->references('idEmpresa')
                ->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nif')->unique();
            $table->string('nombre');
            $table->string('cargo');
            $table->string('correo');
            $table->string('telefono');
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
        Schema::dropIfExists('tutoresLaborales');
    }
};
