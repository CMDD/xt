<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarRecordatorioTablaNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('notas', function (Blueprint $table) {
          $table->string('recordatorio')->nullable;
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('notas', function (Blueprint $table) {
          $table->dropColumn('recordatorio');
      });
    }
}
