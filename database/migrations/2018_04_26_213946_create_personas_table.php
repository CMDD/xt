<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('correo_alternativo')->nullable();
            $table->string('correo')->unique();
            $table->string('direccion')->nullable();
            $table->string('direccion_especificacion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_alternativo')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('numero_planilla')->nullable();
            $table->string('numero_registro')->nullable();
            $table->string('voz')->nullable();
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('personas');
    }
}
