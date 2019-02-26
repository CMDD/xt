<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notificacion;
use App\Nota;
use Carbon\Carbon;

class Recordatorio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ixtus:recordatorio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recordatorio';

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
      $hoy = Carbon::now();
      $notis = Nota::where('recordatorio','<=',$hoy)->get();

      // $noti = new Notificacion();
      // $noti->tipo = 'Alerta';
      // $noti->suscripcion_id = $n->id;
      // $noti->mensaje = '';
      // $noti->save();

      return $this->info($notis);
    }
}
