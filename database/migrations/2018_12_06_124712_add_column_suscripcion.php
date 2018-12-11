<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSuscripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
      Schema::table('suscripcions',function(Blueprint $table){
              $table->string('envio_hasta')->nullable();
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
          $table->dropColumn(['envio_hasta']);
      });
    }
}
