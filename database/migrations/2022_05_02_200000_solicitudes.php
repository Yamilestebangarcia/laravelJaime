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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->bigIncrements('idSolicitudes');
            // llave foránea idEmpresa
            $table->unsignedBigInteger('idEmpresaFK');
            $table->foreign('idEmpresaFK')
                ->references('idEmpresa')
                ->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // llave foránea idTutorLaboral
            $table->unsignedBigInteger('idTutorLaboralFK');
            $table->foreign('idTutorLaboralFK')
                ->references('idTutorLaboral')
                ->on('tutoresLaborales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //campos idTutorLaboral
            $table->string('nif')->unique();
            $table->string('nombreTutor');
            $table->string('cargo');
            $table->string('correoTutor')->unique();
            $table->string('telefonoTutor')->unique();

            // llave foránea idSede
            $table->unsignedBigInteger('idSedeFK');
            $table->foreign('idSedeFK')
                ->references('idSede')
                ->on('sedes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //campos idSede
            $table->string('nombreSede')->unique();
            $table->string('direccion'); //calle y número
            $table->string('codPostal');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('correoSede')->unique();
            $table->string('telefonoSede')->unique();

            // llave foránea idCicloCurso
            $table->unsignedBigInteger('idCicloCursoFK');
            $table->foreign('idCicloCursoFK')
                ->references('idCicloCurso')
                ->on('cicloCursos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //campos cicloCurso
            $table->string('ciclo'); // viene en la tabla cicloCursos
            $table->string('curso'); // viene en la tabla cicloCursos
            $table->string('nombreCiclo'); // viene en la tabla cicloCursos
            $table->string('modalidad'); // viene en la tabla cicloCursos

            // campos propios
            $table->string('numAlumnos');
            $table->string('fecha');
            $table->string('periodo');
            $table->string('horario');
            $table->string('observaciones');

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
        Schema::dropIfExists('solicitudes');
    }
};
