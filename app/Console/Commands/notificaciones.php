<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notificacion;
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
        $noti = new Notificacion();
        $noti->tipo = 'Alerta';
        $noti->mensaje = 'Se venció una suscripcion';
        $noti->save();
        return $this->info('Los mensajes de felicitacion han sido enviados correctamente');
    }
}
