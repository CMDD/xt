<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_benefactor')->nullable();
            $table->string('estado')->nullable();
            $table->string('valor')->nullable();
            $table->string('recibo_pago')->nullable();
            $table->string('fecha')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('programa')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();

            $table->string('periocidad')->nullable();
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
                  
            $table->integer('region_id')->unsigned()->nullable();
            $table->foreign('region_id')
                  ->references('id')
                  ->on('regions')
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
        Schema::dropIfExists('donacions');
    }
}
