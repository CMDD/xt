@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>CREAR SUSCRIPCIÓN</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12">
<div class="x_panel">

<div class="x_content">
<div class="col-md-7 col-sm-9 col-xs-12">

<form class="" action="{{url('crear-suscripcion')}}" method="post">
  {!!csrf_field()!!}
  <div class="x_title">
  <h2 style="color: #283F52" >DATOS DE QUIEN COMPRA LA SUSCRIPCIÓN</h2>
  <div class="clearfix"></div>
  </div>

  <div class="col-md-6 form-group">
    <label for="">Nombres</label>
    <input type="text" required class="form-control" id="" name="nombres">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Apellidos</label>
    <input type="text" class="form-control" required id="" name="apellidos">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Cedula</label>
    <input type="text" class="form-control" required id="" name="cedula">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Correo</label>
    <input type="text"  class="form-control" id="" name="correo">
    @if($errors->has('correo'))
      <span class="invalid-feedback">
        <strong style="color:red" >{{ $errors->first('correo') }}</strong>
      </span>
    @endif
  </div>
  <div class="col-md-6 form-group">
    <label for="">Teléfono - Celular</label>
    <input type="text" class="form-control" id="" name="telefono">
  </div>
   <div class="col-md-6 form-group">
    <label for="">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="" name="fecha_nacimiento" placeholder="">
  </div>
<!-- DATOS DE ENVIO -->

  <div class="x_title">
  <h2 style="color: #283F52">DATOS DE ENTREGA</h2>
  <div class="clearfix"></div>
  </div>
  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input type="text" required class="form-control" id="" name="nombre_recibe" placeholder="">
  </div>
 <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input required type="text" class="form-control" id="" name="direccion" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" name="especificacion_direccion" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Región</label>
   <select required id="region" name="region" class="form-control">
     <option value="">Seleccione...</option>
     @foreach($regiones as $region)
     <option value="{{$region->id}}">{{$region->nombre}}</option>
     @endforeach
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Departamento</label>
   <select required id="departamento" name="departamento" class="form-control">
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Municipio</label>
   <select required id="municipio" class="form-control" name="municipio">
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Enviar a partir de:  </label>
   <input required type="date" class="form-control" id="" name="apartir_de">

 </div>

 <div class="col-md-12 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" rows="5" cols="80"></textarea>
 </div>

 <div class="col-md-9 form-group">
   <input type="submit" class="btn btn-primary" name="" value="CREAR">
 </div>

<br/>
<div id="mainb" style="height:150px;"></div>
</div>
<!-- start project-detail sidebar -->
<div class="col-md-5 col-sm-3 col-xs-12">
<section class="panel">
<div class="x_title">
<h2 style="color: #283F52">DATOS DE LA SUSCRIPCIÓN</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<h3 class="green"></h3>
<div class="col-md-6 form-group">
  <label for=""><i class="fa fa-book"></i>Jovenes</label>
  <input type="number" required min="0" class="form-control" id="" name="jovenes" value="0">
</div>
<div class="col-md-6 form-group">
  <label for=""><i class="fa fa-book"></i>Adultos</label>
  <input type="number" required min="0" class="form-control" id="" name="adultos" value="0">
</div>
<div class="col-md-6 form-group">
  <label for=""><i class="fa fa-book"></i>Niños</label>
  <input type="number" required min="0" class="form-control" id="" name="ninos" value="0">
</div>
<div class="col-md-6 form-group">
  <label for=""><i class="fa fa-book"></i>Puerta a la palabra</label>
  <input type="number" required min="0" class="form-control" id="" name="puerta" value="0">
</div>

<div class="col-md-12 form-group">
  <label for="">Fecha de pago</label>
  <input required type="date" class="form-control" id="" name="fecha_pago" placeholder="Consecutivo del desprendible asignado">

</div>
<div class="col-md-12 form-group">
  <label for="">Tiempo de la suscripción</label>
  <select required class="form-control" name="tiempo">
    <option value="">Seleccione...</option>
    <option value="6">6 meses</option>
    <option value="12">1 Año</option>
  </select>
</div>
<div class="col-md-12 form-group">
  <label for="">Numero de suscripción</label>
  <input required type="text" class="form-control" id="" name="numero_suscripcion" placeholder="Consecutivo del desprendible asignado">
</div>
<div class="col-md-12 form-group">
  <label for="">No.Factura</label>
  <input required type="text" class="form-control" id="" name="numero_factura" placeholder="Indique el numero de la factura de venta">
</div>
<div class="col-md-12 form-group">
  <label for="">Punto de venta</label>
  <select required class="form-control" name="punto">
    <option value="">Seleccione...</option>
    <option value="">Tiendaminutodedios.com Bogota</option>
  </select>
</div>

<br />
<br />
<br/>
</div>
</section>
</div>
</form>
<!-- end project-detail sidebar -->
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
