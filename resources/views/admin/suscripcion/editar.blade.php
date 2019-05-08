@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>EDITAR SUSCRIPCIÓN</h3>
</div>

</div>
<div class="clearfix"></div>

<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2> IXTUS |
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" name="button">Agregar mes de entrega</button>
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel2">Agregar cantidad de mes</h4>
              </div>
              <div class="modal-body">
                <form class="" action="{{url('agregar-mes')}}" method="post">
                  {!!csrf_field()!!}
                  <div class="col-md-12 form-group">
                    <input  type="number" class="form-control" id="" name="mes"  placeholder="">
                  </div>
                  <input type="hidden" name="suscripcion" value="{{$sus->id}}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
              </form>

          </div>
      </div>
  </div>


  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-renovacion-modal-sm" name="button">Renovar</button>
  <div class="modal fade bs-renovacion-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm ">
          <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel1">Renovación</h4>
              </div>
              <div class="modal-body">
                <form class="" action="{{url('renovar')}}" method="post">
                  {!!csrf_field()!!}
                  <div class="col-md-12 form-group">
                    <label for="">Tiempo</label>
                    <select class="form-control" name="mes">
                      <option value="">Seleccione...</option>
                      <option value="6">6 Meses</option>
                      <option value="12">1 Año</option>
                    </select>
                  </div>
                  <input type="hidden" name="suscripcion" value="{{$sus->id}}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
              </form>

          </div>
      </div>
  </div>

  <a href="{{url('suscripcion-historial',$sus->id)}}">
    <button type="button" class="btn btn-primary " name="button">Historial</button>
  </a>
</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a href="#"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="#"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>

<div class="x_content">
<div class="col-md-7 col-sm-9 col-xs-12">

<form class="" action="{{route('actualizar.suscripcion',$sus->id)}}" method="post">
  {!!csrf_field()!!}

  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input type="text" class="form-control" id="" name="nombre_recibe" value="{{$sus->nombre_recibe}}" placeholder="">
  </div>


  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" id="" name="telefono" value="{{$sus->telefono}}" placeholder="">
  </div>
 <div class="col-md-6 form-group">
   <label for="">Plan</label>
   <select class="form-control" name="plan">
     <option value="{{$sus->plan}}">{{$sus->plan}} Meses</option>
     <option value="6">6 Meses</option>
     <option value="12">1 Año</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Estado</label>
   <select class="form-control" name="estado">
     <option value="{{$sus->estado}}">{{$sus->estado}}</option>
     <option value="Activo">Activo</option>
     <option value="Desactivo">Desactivo</option>
   </select>
 </div>
 <div class="col-md-12 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" name="direccion" value="{{$sus->direccion}}" placeholder="">
 </div>
 <!-- <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" name="especificacion_direccion" value="{{$sus->direccion_especificacion}}" placeholder="">
 </div> -->
 <div class="col-md-6 form-group">
   <label for="">Región</label>
   <select id="region" name="region" class="form-control">
     <option value="{{$sus->municipio->departamento->region->id}}">{{$sus->municipio->departamento->region->nombre}}</option>
     @foreach($regiones as $region)
     <option value="{{$region->id}}">{{$region->nombre}}</option>
     @endforeach

   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Departamento</label>
   <select  id="departamento" name="departamento" class="form-control">
     <option value="{{$sus->municipio->departamento->id}}">{{$sus->municipio->departamento->nombre}}</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Minicipio</label>
   <select  id="municipio" class="form-control" name="municipio">
     <option value="{{$sus->municipio->id}}">{{$sus->municipio->nombre}}</option>
   </select>
 </div>


 <div class="col-md-6 form-group">
   <label for="">Fecha de inicio</label>
   <input  type="text" class="form-control" id="" disabled value="{{$sus->apartir_de->format('d/m/Y')}}" name="apartir_de">
 </div>
 <div class="col-md-6 form-group">
   <label for="" >Vence  </label>
   <input  type="date" class="form-control" id=""  name="vence"  value="{{$sus->envio_hasta->format('Y-m-d')}}"  >
 </div>

 <div class="col-md-6 form-group">
   <label for="">Fecha de pago </label>
   <input type="text" disabled class="form-control" id="" value="{{$sus->fecha_inicio->format('d/m/y')}}">
 </div>
 <!-- <div class="col-md-6 form-group">
   <label for="">Fecha de cancelación </label>
   <input type="text" disabled class="form-control" id="" value="{{$sus->fecha_final->format('d/m/y')}}">
 </div> -->



 <div class="col-md-6 form-group">
   <label for="">Numero de suscripción</label>
   <input  type="text" class="form-control" id="" name="numero_suscripcion" value="{{$sus->numero_suscripcion}}"">
 </div>
 <div class="col-md-6 form-group">
   <label for="">No.Factura</label>
   <input  type="text" class="form-control" id="" name="numero_factura" value="{{$sus->numero_factura}}">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Punto de venta</label>
   <select required class="form-control" name="punto">
     <option value="{{$sus->punto_venta}}">{{$sus->punto_venta}}</option>
     <option value="Efecty">Efecty</option>
     <option value="Corporación minuto de Dios">Corporación minuto de Dios</option>
     <option value="Centro de Contacto">Centro de Contacto</option>
     <option value="Libreria Minuto de Dios">Libreria Minuto de Dios </option>
     <option value="Libreria - Soledad">Libreria - Soledad </option>
     <option value="Libreria - Cedritos">Libreria - Cedritos </option>
     <option value="Libreria - Ibague">Libreria - Ibague </option>
     <option value="Libreria - Antioquia Centro">Libreria - Antioquia Centro </option>
     <option value="Libreria - Antioquia Laureles">Libreria - Antioquia Laureles </option>
     <option value="Libreria - Antioquia Itagui">Libreria - Antioquia Itagui </option>
     <option value="Libreria - Cartagena Pie de la popa">Libreria - Cartagena Pie de la popa </option>
     <option value="Libreria - Cartagena Plazuela">Libreria - Cartagena Plazuela </option>
     <option value="Libreria - Barranquilla Tierra nueva">Libreria - Barranquilla Tierra nueva </option>
     <option value="Libreria - Barranquilla Sao calle 53">Libreria - Barranquilla Sao calle 53 </option>
     <option value="Libreria - Barranquilla Sao calle 93">Libreria - Barranquilla Sao calle 93 </option>
     <option value="Tiendaminutodedios.com">Tiendaminutodedios.com</option>
   </select>
 </div>

 <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" rows="5" cols="80">{{$sus->observacion}}</textarea>
 </div>
 <div class="col-md-9 form-group">
   <input type="submit" class="btn btn-primary" name="" value="ACTUALIZAR">
 </div>
<br/>

<div id="mainb" style="height:150px;"></div>
</div>
<!-- start project-detail sidebar -->
<div class="col-md-5 col-sm-3 col-xs-12">
<section class="panel">
<div class="x_title">
<h2>ORACIONALES</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Jovenes</label>
    <input type="number"  min="0" class="form-control" id="" name="jovenes" value="{{$sus->jovenes}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Adultos</label>
    <input type="number"  min="0" class="form-control" id="" name="adultos" value="{{$sus->adultos}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Niños</label>
    <input type="number"  min="0" class="form-control" id="" name="ninos" value="{{$sus->ninos}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Puerta a la palabra</label>
    <input type="number"  min="0" class="form-control" id="" name="puerta" value="{{$sus->puerta}}">
  </div>
<hr>
<br />
<br/>
</div>
</section>
</div>
<div class="col-md-5 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>DETALLES DEL TITULAR</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
  <div class="project_detail">
  <p class="title">TITULAR</p>
  <p>{{$sus->persona->nombres}}</p>
  <p class="title">Correo</p>
  <p>{{$sus->persona->correo}}</p>
  <p class="title">Telefono</p>
  <p>{{$sus->persona->telefono}}</p>
  </div>
</div>

</section>

</div>
<div class="col-md-5 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>DETALLES DEL USUARIO</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
  <div class="project_detail">
  <p class="title">TITULAR</p>
  <p>{{$sus->usuario->name}}</p>
  <p class="title">Correo</p>
  <p>{{$sus->usuario->email}}</p>
  <p class="title">Telefono</p>
  <p>{{$sus->usuario->telefono}}</p>
  </div>
</div>

</section>

</div>
<!-- end project-detail sidebar -->
</form>
</div>
</div>
</div>
</div>
</div>

<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->

</div>
<!-- /page content -->
@endsection
