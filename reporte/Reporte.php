<?php
namespace Reporte;
use App\Region;
use App\Persona;
use App\TipoPersona;

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

    }elseif ($request->tipo == 'cantidades') {
      $cantidad = true;
      $reporte = new Reporte();
      $total = Persona::where('estado',$request->estado)
                        ->where('region',$request->region)
                        ->where('created_at','>=',$request->desde)
                        ->where('created_at','<=',$request->hasta)
                        ->count();
      $totalp = Persona::where('estado',$request->estado)
                       ->where('region',$request->region)
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

      }else{
        $personas = Persona::where('region',$request->region)
                            ->where('estado',$request->estado)
                            ->where('created_at','>=',$request->desde)
                            ->where('created_at','<=',$request->hasta)->get();

      }
      return view('admin.reporte.index')->with('regiones',$regiones)
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
    $proveedor =0;
    $suscriptor =0;
    $benefactor =0;
    $empleado =0;
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

}
