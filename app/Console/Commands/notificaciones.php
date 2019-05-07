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
      $sus = Suscripcion::all();
      $hoy = $carbon->now();

      foreach ($sus as $n) {
          $fechaF = date_diff($hoy, $n->envio_hasta);

          if($hoy > $n->envio_hasta ){
            $n->estado = 'Desactivo';
            $n->save();
            
          }
          if($n->envio_hasta > $hoy ){
            $n->estado = 'Activo';
            $n->save();
            
          }
  

      }
        // return $this->info('Verificaciones de suscripciones completado');
        //  return $this->info($hoy);
    }
}


// if ($fechaF->days == 15  or $fechaF->days < 15) {
//           if ($fechaF->days <= 0) {
//             $noti = new Notificacion();
//             $noti->tipo = 'Alerta';
//             $noti->suscripcion_id = $n->id;
//             $noti->mensaje = 'La suscripcion fué desactivada';
//             $noti->save();
//             $n->estado = 'Desactivo';
//             $n->save();
//             // return $this->info($fechaF->days);
//           }else{
//             $noti = new Notificacion();
//             $noti->tipo = 'Alerta';
//             $noti->suscripcion_id = $n->id;
//             $noti->mensaje = 'La suscripcion vence dentro de'.' '.$fechaF->days.' '.'días';
//             $noti->save();
//             return $this->info($fechaF->days);
//           }

//         }

//  if ($fechaF->days == 60) {
//           $noti = new Notificacion();
//           $noti->tipo = 'Alerta';
//           $noti->suscripcion_id = $n->id;
//           $noti->mensaje = 'La suscripcion vence dentro de 2 meses';
//           $noti->save();
//         }
//         if ($fechaF->days == 30) {
//           $noti = new Notificacion();
//           $noti->tipo = 'Alerta';
//           $noti->suscripcion_id = $n->id;
//           $noti->mensaje = 'La suscripcion vence dentro de 1 meses';
//           $noti->save();
//         }
         