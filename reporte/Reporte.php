<?php
namespace Reporte;
use App\Region;
use App\Persona;
use App\TipoPersona;
use App\Ciudad;
use App\Suscripcion;
use App\Donacion;
use Maatwebsite\Excel\Facades\Excel;

class Reporte{

  public  function reporteTirulares($request){

    $regiones = Region::all();
    $cantidad = false;
    $listado = false;

    if ($request->tipo == 'cantidades' and $request->region == 'Todas') {
        $cantidad = true;
        $total = Persona::where('estado',$request->estado)
                        ->where('created_at','>=',$request->desde)
                        ->where('created_at','<=',$request->hasta)
                        ->count();
        $totalp = Persona::where('estado',$request->estado)
                        ->where('created_at','>=',$request->desde)
                        ->where('created_at','<=',$request->hasta)
                        ->get();
        $reporte = new Reporte();
        $valores = $reporte->calculoCatidades($request,$total,$totalp);

    }elseif ($request->tipo == 'cantidades'){
      $cantidad = true;
      $reporte = new Reporte();
      $total = Persona::where('estado',$request->estado)
                        ->where('region_id',$request->region)
                        ->where('created_at','>=',$request->desde)
                        ->where('created_at','<=',$request->hasta)
                        ->count();
      $totalp = Persona::where('estado',$request->estado)
                       ->where('region_id',$request->region)
                       ->where('created_at','>=',$request->desde)
                       ->where('created_at','<=',$request->hasta)
                       ->get();
      $valores = $reporte->calculoCatidades($request,$total,$totalp);
    }else{
      $listado = true;
      if ($request->region == 'Todas') {
      $personas = Persona::where('estado',$request->estado)
                         ->where('created_at','>=',$request->desde)
                         ->where('created_at','<=',$request->hasta)->get();
      }elseif ($request->region == 4) {

        $personas = Persona::where('estado',$request->estado)
                           ->where('numero_registro','Web IP: ')
                           ->where('created_at','>=',$request->desde)
                           ->where('created_at','<=',$request->hasta)->get();

      }else{
      $personas = Persona::where('estado',$request->estado)
                         ->where('region_id',$request->region)
                         ->where('created_at','>=',$request->desde)
                         ->where('created_at','<=',$request->hasta)->get();
      }
      return view('admin.reporte.titulares.lista')->with('regiones',$regiones)
                                                  ->with('personas',$personas)
                                                  ->with('listado',$listado);
    }
      return view('admin.reporte.index')->with('regiones',$regiones)
                                        ->with('cantidad',$cantidad)
                                        ->with('valores',$valores);
  }
  public function calculoCatidades($request,$total,$totalp){
    $desde = $request->desde;
    $hasta = $request->hasta;
    $oyente=0;
    $cliente=0;
    $alumno =0;
    $asistente=0;
    $servidor=0;
    $proveedor=0;
    $suscriptor=0;
    $benefactor=0;
    $empleado=0;

    foreach($totalp as $to){
      $oyentes = TipoPersona::where('nombre','Oyente')->where('persona_id',$to->id)->count();
      $clientes = TipoPersona::where('nombre','Cliente')->where('persona_id',$to->id)->count();
      $alumnos = TipoPersona::where('nombre','Alumno')->where('persona_id',$to->id)->count();
      $asistentes = TipoPersona::where('nombre','Asistente')->where('persona_id',$to->id)->count();
      $servidores = TipoPersona::where('nombre','Servidor')->where('persona_id',$to->id)->count();
      $proveedores = TipoPersona::where('nombre','Proveedor')->where('persona_id',$to->id)->count();
      $suscriptores  = TipoPersona::where('nombre','Suscriptor')->where('persona_id',$to->id)->count();
      $benefactores  = TipoPersona::where('nombre','Benefactor')->where('persona_id',$to->id)->count();
      $empleados  = TipoPersona::where('nombre','Empleado')->where('persona_id',$to->id)->count();
      if ($oyentes > 0) {
        $oyente = $oyente +1;
      }
      if ($clientes > 0) {
        $cliente = $cliente +1;
      }
      if ($alumnos > 0) {
        $alumno = $alumno +1;
      }
      if ($asistentes > 0) {
        $asistente =$asistente +1;
      }
      if ($servidores > 0) {
        $servidor =  $servidor +1;
      }
      if ($proveedores > 0) {
        $proveedor =  $proveedor +1;
      }
      if ($suscriptores  > 0) {
        $suscriptor = $suscriptor +1;
      }
      if ($benefactores  > 0) {
        $benefactor = $benefactor +1;
      }
      if ($empleados  > 0) {
        $empleado = $empleado +1;
      }
    }

    $valores = [
        'total' => $total,
        'oyente' => $oyente,
        'cliente' => $cliente,
        'alumno' => $alumno,
        'asistente' => $asistente,
        'servidor' => $servidor,
        'proveedor' => $proveedor,
        'suscriptor' => $suscriptor,
        'benefactor' => $benefactor,
        'empleado' => $empleado
    ];
    return $valores;
  }

  public function descargarTitulares($request){
    if ($request->region == 'Todas') {
        Excel::create('Reporte Titulares', function($excel) use ($request){
          $excel->sheet('Reporte Titulares', function($sheet) use ($request){
            if ($request->estado=='Todos') {
              $personas =  Persona::where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();

               // foreach ($personas as $persona) {
               //   $tipos[] = TipoPersona::where('persona_id',$persona->id)->get();
               // }

            }else{
              $personas =  Persona::where('estado',$request->estado)
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();

            }

          $sheet->fromArray($personas);
          $sheet->setOrientation('landscape');
          $sheet->row(1,[
            'ID','ESTADO','NOMBRES','APELLIDOS','TIPO DOCUMENTO','NUMERO DOCUMENTO','FECHA DE NACIMIENTO','CORREO ALTERNATIVO',
            'CORREO','DIRECCIÓN','ESPECIFICACION DIRECCIÓN','TÉLEFONO','TELEFONO ALTERNATIVO','OCUPACION','NUMERO DE REGISTRO','NUMERO PLANILLA','ARCHIVO DE VOZ','IMAGEN','USUARIO',
            'MUNICIPIO','REGION','FECHA DE CREACION','FECHA DE ACTUALIZACIÓN'
          ]);

            foreach($personas as $index => $persona) {
                $sheet->row($index+2, [
                    $persona->id,$persona->estado, $persona->nombres, $persona->apellidos, $persona->tipo_documento,$persona->numero_documento,
                    $persona->fecha_nacimiento,$persona->correo_alternativo,$persona->correo,$persona->direccion,$persona->direccion_especificacion,
                    $persona->telefono,$persona->telefono_alternativo,$persona->ocupacion,'Pendiente...',$persona->numero_registro.$persona->numero_planilla,'Pendiente...','Imagen',$persona->usuario['email'],
                    $persona->municipio['nombre'],$persona->numero_registro,$persona->created_at,$persona->updated_at
                ]);
            }
          });
      })->export('xls');
    }elseif ($request->region == 4) {

      Excel::create('Reporte Titulares', function($excel) use ($request) {
          $excel->sheet('Reporte Titulares', function($sheet) use ($request)  {
            if ($request->estado== 'Todos') {
              $personas =  Persona::where('numero_registro','Web IP: ')
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();
            }else{
              $personas =  Persona::where('numero_registro','Web IP: ')
                                   ->where('estado',$request->estado)
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();
            }
          $sheet->fromArray($personas);
          $sheet->setOrientation('landscape');
          $sheet->row(1,[
            'ID','ESTADO','NOMBRES','APELLIDOS','TIPO DOCUMENTO','NUMERO DOCUMENTO','FECHA DE NACIMIENTO','CORREO ALTERNATIVO',
            'CORREO','DIRECCIÓN','ESPECIFICACION DIRECCIÓN','TÉLEFONO','TELEFONO ALTERNATIVO','OCUPACION','NUMERO DE REGISTRO','NUMERO PLANILLA','ARCHIVO DE VOZ','IMAGEN','USUARIO',
            'MUNICIPIO','REGION','FECHA DE CREACION','FECHA DE ACTUALIZACIÓN'
          ]);

            foreach($personas as $index => $persona) {
                $sheet->row($index+2, [
                    $persona->id,$persona->estado, $persona->nombres, $persona->apellidos, $persona->tipo_documento,$persona->numero_documento,
                    $persona->fecha_nacimiento,$persona->correo_alternativo,$persona->correo,$persona->direccion,$persona->direccion_especificacion,
                    $persona->telefono,$persona->telefono_alternativo,$persona->ocupacion,'Pendiente...',$persona->numero_registro.$persona->numero_planilla,'Pendiente...','Imagen',$persona->usuario['name'],
                    $persona->municipio['nombre'],$persona->numero_registro,$persona->created_at,$persona->updated_at
                ]);
            }
          });
      })->export('xls');

    }else{
      Excel::create('Reporte Titulares', function($excel) use ($request) {
          $excel->sheet('Reporte Titulares', function($sheet) use ($request)  {
            if ($request->estado== 'Todos') {
              $personas =  Persona::where('region_id',$request->region)
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();
            }else{
              $personas =  Persona::where('region_id',$request->region)
                                   ->where('estado',$request->estado)
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();
            }
          $sheet->fromArray($personas);
          $sheet->setOrientation('landscape');
          $sheet->row(1,[
            'ID','ESTADO','NOMBRES','APELLIDOS','TIPO DOCUMENTO','NUMERO DOCUMENTO','FECHA DE NACIMIENTO','CORREO ALTERNATIVO',
            'CORREO','DIRECCIÓN','ESPECIFICACION DIRECCIÓN','TÉLEFONO','TELEFONO ALTERNATIVO','OCUPACION','NUMERO DE REGISTRO','NUMERO PLANILLA','ARCHIVO DE VOZ','IMAGEN','USUARIO',
            'MUNICIPIO','REGION','FECHA DE CREACION','FECHA DE ACTUALIZACIÓN'
          ]);

            foreach($personas as $index => $persona) {
                $sheet->row($index+2, [
                    $persona->id,$persona->estado, $persona->nombres, $persona->apellidos, $persona->tipo_documento,$persona->numero_documento,
                    $persona->fecha_nacimiento,$persona->correo_alternativo,$persona->correo,$persona->direccion,$persona->direccion_especificacion,
                    $persona->telefono,$persona->telefono_alternativo,$persona->ocupacion,'Pendiente...',$persona->numero_registro.$persona->numero_planilla,'Pendiente...','Imagen',$persona->usuario['name'],
                    $persona->municipio['nombre'],$persona->numero_registro,$persona->created_at,$persona->updated_at
                ]);
            }
          });
      })->export('xls');
    }
  }

  public function descargarSuscripciones($request){
      Excel::create('Reporte suscripciones', function($excel) use ($request) {
          $excel->sheet('Reporte Titulares', function($sheet) use ($request)  {
          if ($request->region == 'Todas') {
          $suscripciones =  Suscripcion::where('estado',$request->estado)
                                       ->where('created_at','>=',$request->desde)
                                       ->where('created_at','<=',$request->hasta)->get();
          }else{
          $suscripciones =  Suscripcion::where('estado',$request->estado)
                                           ->where('region_id',$request->region)
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();
          }
          // Header
          $sheet->row(1,
          ['
          ID SUSCRIPCION','NOMBRE TITULAR','TELÉFONO TITULAR','RECIBE','TELÉFONO','DIRECCIÓN',
          'ESPECIFICACIÓN DE DIRECCIÓN','MUNICIPIO','DEPARTAMENTO','JOVENES','ADULTOS','NIÑOS',
          'PUERTA A LA PALABRA','OBSERVACION'
          ]
          );
          // Data
          foreach ($suscripciones as $sus) {
            $row = [];
            $row[0] = $sus->id;
            $row[1] = $sus->persona->nombres ." ". $sus->persona->apellidos ;
            $row[2] = $sus->persona->telefono;
            $row[3] = $sus->nombre_recibe;
            $row[4] = $sus->telefono;
            $row[5] = $sus->direccion;
            $row[6] = $sus->direccion_especificacion;
            $row[7] = $sus->municipio->nombre;
            $row[8] = $sus->municipio->departamento->nombre;
            $row[9] = $sus->jovenes;
            $row[10] = $sus->adultos;
            $row[11] = $sus->ninos;
            $row[12] = $sus->puerta;
            $row[13] = $sus->observacion;
            $sheet->appendRow($row);
          }
          $sheet->setOrientation('landscape');
          });
      })->export('xls');
  }

  public function verSuscripciones($request){
       if ($request->region == 'Todas') {
       $sus = Suscripcion::where('estado',$request->estado)
                         ->where('created_at','>=',$request->desde)
                         ->where('created_at','<=',$request->hasta)->get();
       return view('admin.reporte.suscripcion.lista')->with('sus',$sus);
       }else{
       $sus = Suscripcion::where('estado',$request->estado)
                         ->where('region_id',$request->region)
                         ->where('created_at','>=',$request->desde)
                         ->where('created_at','<=',$request->hasta)->get();
       return view('admin.reporte.suscripcion.lista')->with('sus',$sus);
        }
  }


  public function descargarDonaciones($request){
      Excel::create('Reporte donaciones', function($excel) use ($request) {
          $excel->sheet('Reporte', function($sheet) use ($request)  {
          if ($request->region == 'Todas') {
          $donaciones =  Donacion::where('estado',$request->estado)
                                       ->where('created_at','>=',$request->desde)
                                       ->where('created_at','<=',$request->hasta)->get();
          }else{
          $donaciones =  Donacion::where('estado',$request->estado)
                                           ->where('region_id',$request->region)
                                   ->where('created_at','>=',$request->desde)
                                   ->where('created_at','<=',$request->hasta)->get();
          }
          // Header
          $sheet->row(1,
          ['
          IDENTIFICACIÓN','NOMBRE BENEFACTOR','PROGRAMA','PERIODICIDAD','TELÉFONO','DIRECCIÓN',
          'FECHA DE DONACIÓN','# RECIBO DE PAGO','REGION','MUNICIPIO','USUARIO'
          ]
          );
          // Data
          foreach ($donaciones as $don) {
            $row = [];
            $row[0] = $don->id;
            $row[1] = $don->nombre_benefactor;
            $row[2] = $don->programa;
            $row[3] = $don->periocidad;
            $row[4] = $don->telefono;
            $row[5] = $don->direccion;
            $row[6] = $don->fecha;
            $row[7] = $don->recibo_pago;
            $row[8] = $don->municipio->departamento->region->nombre;
            $row[9] = $don->municipio->nombre;
            $row[10] = $don->usuario->name;
            $sheet->appendRow($row);
          }
          $sheet->setOrientation('landscape');
          });
      })->export('xls');
  }

  public function verDonaciones($request){
       if ($request->region == 'Todas') {
       $don = Donacion::where('estado',$request->estado)
                         ->where('created_at','>=',$request->desde)
                         ->where('created_at','<=',$request->hasta)->get();
       return view('admin.reporte.donaciones')->with('donaciones',$don);
       }else{
       $don = Donacion::where('estado',$request->estado)
                         ->where('region_id',$request->region)
                         ->where('created_at','>=',$request->desde)
                         ->where('created_at','<=',$request->hasta)->get();
       return view('admin.reporte.donaciones')->with('donaciones',$don);
        }
  }

}
