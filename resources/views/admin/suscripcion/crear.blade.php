@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>SUSCRIPCIONES</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2> IXTUS</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a href="#"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="#"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="col-md-9 col-sm-9 col-xs-12">

<form class="" action="{{url('crear-suscripcion')}}" method="post">
  {!!csrf_field()!!}
  <div class="col-md-6 form-group">
    <label for="">Cantidad</label>
    <input type="number" class="form-control" id="" name="cantidad" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Nombres</label>
    <input type="text" class="form-control" id="" name="nombres" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Apellidos</label>
    <input type="text" class="form-control" id="" name="apellidos" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Correo</label>
    <input type="text" class="form-control" id="" name="correo" placeholder="">
    @if($errors->has('correo'))
      <span class="invalid-feedback">
        <strong style="color:red" >{{ $errors->first('correo') }}</strong>
      </span>
    @endif
  </div>
  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input type="text" class="form-control" id="" name="nombre_recibe" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" id="" name="telefono" placeholder="">
  </div>
 <div class="col-md-6 form-group">
   <label for="">Oracional</label>
   <select required class="form-control" name="oracional">
     <option value="">Seleccione...</option>
     <option value="Jovenes">Jovenes</option>
     <option value="Aldultos">Adultos</option>
     <option value="Niños">Niños</option>
     <option value="Puerta a la palabra">Puerta a la palabra</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Plan</label>
   <select required class="form-control" name="plan">
     <option value="">Seleccione...</option>
     <option value="6">6 meses</option>
     <option value="12">1 Año</option>
   </select>
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
   <select id="region" name="region" class="form-control">
     <option value="">Seleccione...</option>
     @foreach($regiones as $region)
     <option value="{{$region->id}}">{{$region->nombre}}</option>
     @endforeach

   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Departamento</label>
   <select id="departamento" name="departamento" class="form-control">
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Minicipio</label>
   <select id="municipio" class="form-control" name="municipio">
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Fecha de suscripcion</label>
   <input type="date" required class="form-control" id="" name="fecha" placeholder="">
 </div>
 <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" rows="5" cols="80"></textarea>
 </div>
 <div class="col-md-9 form-group">
   <input type="submit" class="btn btn-primary" name="" value="CREAR">
 </div>
</form>
<br/>
<div id="mainb" style="height:150px;"></div>
</div>
<!-- start project-detail sidebar -->
<div class="col-md-3 col-sm-3 col-xs-12">
<section class="panel">
<div class="x_title">
<h2>Información</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<h3 class="green"><i class="fa fa-book"></i></h3>
<p>Tener en cuenta que las entregas de los oracionales
se realizarán a partir de dia 15 de cada mes.</p>
<br />
<br />
<br/>
</div>
</section>
</div>
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
