<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCamposTablaSuscripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suscripcions',function(Blueprint $table){
                $table->string('tipo')->nullable();
                $table->string('numero_factura')->nullable();
                $table->string('punto_venta')->nullable();
                $table->string('apartir_de')->nullable();
                $table->string('numero_suscripcion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suscripcions',function(Blueprint $table){
            $table->dropColumn(['tipo','numero_factura','punto_venta','apartir_de','numero_suscripcion']);
        });
    }
}
