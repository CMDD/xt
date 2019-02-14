<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarUltimocontactoTablaPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('personas', function (Blueprint $table) {
          $table->string('ultimo_contacto')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('personas', function (Blueprint $table) {
          $table->dropColumn('ultimo_contacto');
      });
    }
}
