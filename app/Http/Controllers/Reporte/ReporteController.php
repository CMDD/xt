<?php

namespace App\Http\Controllers\Reporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suscripcion;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{


     public function SuscripcionesServientrega(){
   
      Excel::create('Reporte Servientrega', function($excel)  {
          $excel->sheet('Reporte Servientrega', function($sheet) {
          
          $suscripciones =  Suscripcion::where('estado','Activo')->get();
        
          // Header
          $sheet->row(1,
          ['
          ID SUSCRIPCION','NOMBRE TITULAR','CEDULA TITULAR','TELÉFONO TITULAR','RECIBE','TELÉFONO','DIRECCIÓN',
          'ESPECIFICACIÓN DE DIRECCIÓN','MUNICIPIO','DEPARTAMENTO','JOVENES','ADULTOS','NIÑOS',
          'PUERTA A LA PALABRA','OBSERVACION'
          ]
          );
          // Data
          foreach ($suscripciones as $sus) {
            $row = [];
            $row[0] = $sus->id;
            if(isset($sus->persona->nombres)){
              $row[1] = $sus->persona->nombres ." ". $sus->persona->apellidos ;
              $row[2] = $sus->persona->numero_documento;
              $row[3] = $sus->persona->telefono;
            }else{

              $row[1]= "No tiene";
              $row[2] = "No tiene";
              $row[3] = "No tiene";
            }
            
            
            $row[4] = $sus->nombre_recibe;
            $row[5] = $sus->telefono;
            $row[6] = $sus->direccion;
            $row[7] = $sus->direccion_especificacion;
            $row[8] = $sus->municipio->nombre;
            $row[9] = $sus->municipio->departamento->nombre;
            $row[10] = $sus->jovenes;
            $row[11] = $sus->adultos;
            $row[12] = $sus->ninos;
            $row[13] = $sus->puerta;
            $row[14] = $sus->observacion;
            
            $sheet->appendRow($row);
          }
          $sheet->setOrientation('landscape');
          });
      })->export('xls');
  }
     public function SuscripcionesCompletas($request){
   
      Excel::create('Reporte suscripciones', function($excel) use ($request) {
          $excel->sheet('Reporte Suscripciones', function($sheet) use ($request)  {
          if ($request == 'Activo') {
          $suscripciones =  Suscripcion::where('estado','Activo')->get();
          }else{
          $suscripciones =  Suscripcion::where('estado','Desactivo')->get();
          }
          // Header
          $sheet->row(1,
          ['
          ID SUSCRIPCION','NOMBRE TITULAR','CEDULA TITULAR','TELÉFONO TITULAR','RECIBE','TELÉFONO','DIRECCIÓN',
          'ESPECIFICACIÓN DE DIRECCIÓN','MUNICIPIO','DEPARTAMENTO','JOVENES','ADULTOS','NIÑOS',
          'PUERTA A LA PALABRA','OBSERVACION','NUMERO DE FACTURA','INICIO','VENCE'
          ]
          );
          // Data
          foreach ($suscripciones as $sus) {
            $row = [];
            $row[0] = $sus->id;
            if(isset($sus->persona->nombres)){
              $row[1] = $sus->persona->nombres ." ". $sus->persona->apellidos ;
              $row[2] = $sus->persona->numero_documento;
              $row[3] = $sus->persona->telefono;
            }else{

              $row[1]= "No tiene";
              $row[2] = "No tiene";
              $row[3] = "No tiene";
            }
            
            
            $row[4] = $sus->nombre_recibe;
            $row[5] = $sus->telefono;
            $row[6] = $sus->direccion;
            $row[7] = $sus->direccion_especificacion;
            $row[8] = $sus->municipio->nombre;
            $row[9] = $sus->municipio->departamento->nombre;
            $row[10] = $sus->jovenes;
            $row[11] = $sus->adultos;
            $row[12] = $sus->ninos;
            $row[13] = $sus->puerta;
            $row[14] = $sus->observacion;
            $row[15] = $sus->numero_factura;
            $row[16] = $sus->apartir_de;
            $row[17] = $sus->envio_hasta;
            $sheet->appendRow($row);
          }
          $sheet->setOrientation('landscape');
          });
      })->export('xls');
  }
}
