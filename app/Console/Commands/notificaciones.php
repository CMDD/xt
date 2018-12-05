<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notificacion;
use App\Suscripcion;
use Carbon\Carbon;
class notificaciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'noti:notificaciones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea notificaciones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $carbon = Carbon::now();
      $sus = Suscripcion::where('estado','Activo')->get();
      $hoy = $carbon->now();

      foreach ($sus as $n) {
          $fechaF = date_diff($hoy, $n->fecha_final);
        if ($fechaF->days == 30 or $fechaF->days == 15 ) {
          $noti = new Notificacion();
          $noti->tipo = 'Alerta';
          $noti->suscripcion_id = $n->id;
          $noti->mensaje = 'Está por vencer suscripcion';
          $noti->save();
        }
      }
        return $this->info('Verificaciones de suscripciones completado');
    }
}
