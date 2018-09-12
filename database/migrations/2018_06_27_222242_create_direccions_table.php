<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_recibe')->nullable();
            $table->string('direccion')->nullable();
            $table->string('direccion_especificacion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('telefono')->nullable();
            $table->string('observacion')->nullable();
            $table->string('cantidad')->nullable();
            $table->integer('suscripcion_id')->unsigned()->nullable();
            $table->foreign('suscripcion_id')
                  ->references('id')
                  ->on('suscripcions')
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
        Schema::dropIfExists('direccions');
    }
}
