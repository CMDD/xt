<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad')->nullable();
            $table->string('oracional')->nullable();
            $table->string('estado')->nullable();
            $table->string('plan')->nullable();
            $table->string('telefono')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_final')->nullable();
            $table->string('nombre_recibe')->nullable();
            $table->string('direccion')->nullable();
            $table->string('direccion_especificacion')->nullable();

            $table->string('observacion')->nullable();
            $table->integer('persona_id')->unsigned()->nullable();
            $table->foreign('persona_id')
                  ->references('id')
                  ->on('personas')
                  ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->integer('municipio_id')->unsigned()->nullable();
            $table->foreign('municipio_id')
                  ->references('id')
                  ->on('ciudads')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('suscripcions');
    }
}
