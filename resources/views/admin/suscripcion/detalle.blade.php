@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>DETALLE <small> Ixtus</small></h3>
</div>

</div>
<div class="clearfix"></div>

<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2> ORACIONAL | {{$sus->oracional}}</h2>
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
<ul class="stats-overview">
<li>
<span class="name"> Plan </span>
<span class="value text-success"> {{$sus->plan}} Meses </span>
</li>
<li class="hidden-phone">
<span class="name"> Estado </span>
<span class="value text-success"> {{$sus->estado}}</span>
</li>
<li class="hidden-phone">
<span class="name"> Vence  </span>
<span class="value text-success"> {{$sus->fecha_final}}</span>
</li>
</ul>
<br />

<div id="mainb" style="height:350px;">
  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->nombre_recibe}}" >
  </div>

  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->telefono}}" >
  </div>
  <div class="col-md-6 form-group">
    <label for="">Oracional</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->oracional}}" >
  </div>
  <div class="col-md-6 form-group">
    <label for="">Oracional</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->plan}}" >
  </div>
  <div class="col-md-6 form-group">
    <label for="">Oracional</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->estado}}" >
  </div>


  <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->direccion}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" disabled name="especificacion_direccion" value="{{$sus->direccion_especificacion}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Region</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->region}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Ciudad</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->ciudad}}" placeholder="">
  </div>


  <div class="col-md-6 form-group">
   <label for="">Fecha de suscripcion  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->fecha_inicio}}" name="fecha"  placeholder="">
  </div>
  <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" disabled rows="5" cols="80">{{$sus->observacion}}</textarea>
  </div>

</div>

</div>

<!-- start project-detail sidebar -->
<div class="col-md-3 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>Descripción del titular</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<h3 class="green"><i class="fa fa-book"></i> {{$sus->oracional}}</h3>
<hr>

<div class="project_detail">

<p class="title">Usuario</p>
<p>{{$sus->persona->nombres}}</p>
<p class="title">Correo</p>
<p>{{$sus->persona->correo}}</p>
<p class="title">Telefono</p>
<p>{{$sus->persona->telefono}}</p>
</div>
<br />
<h3>Datos de envío</h3>
<div class="project_detail">

<p class="title">dirección</p>
<p>{{$sus->direccion}}</p>
<p class="title">Especificacion de dirección</p>
<p>{{$sus->direccion_especificacion}}</p>
</div>
<br/>
@can('editar.suscripcion')
<div class="text-center mtop20">
<a href="{{route('editar.suscripcion',$sus->id)}}" class="btn btn-sm btn-primary">Editar</a>
</div>
@endcan
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
