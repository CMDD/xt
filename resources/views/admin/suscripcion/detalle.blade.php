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
<h2> SUSCRIPCION |
  @can('editar.suscripcion')
  <a href="{{route('editar.suscripcion',$sus->id)}}">
    <button type="button" class="btn btn-danger " name="button">Editar</button>
  </a>
  @endcan
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
<ul class="stats-overview">
<li>
<span class="name"> Tiempo </span>
<span class="value text-success"> {{$sus->plan}} Meses </span>
</li>
<li class="hidden-phone">
<span class="name"> Estado </span>
<span class="value text-success"> {{$sus->estado}}</span>
</li>
<li class="hidden-phone">
<span class="name"> Fecha de cancelación  </span>
<span class="value text-success"> {{$sus->fecha_final->format('d/m/Y')}}</span>
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
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->direccion}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" disabled name="especificacion_direccion" value="{{$sus->direccion_especificacion}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Region</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->municipio->departamento->region->nombre}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">departamento</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->municipio->departamento->nombre}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">municipio</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->municipio->nombre}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Numero de factura  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->numero_factura}}"  placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Envío a partir de:</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->apartir_de->format('d/m/Y')}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Envío hasta</label>
    <input disabled type="text" class="form-control" id=""  value="{{$sus->envio_hasta->format('d/m/Y')}}" name="numero_suscripcion" placeholder="Consecutivo del desprendible asignado">
  </div>


  <div class="col-md-6 form-group">
   <label for="">Fecha de pago  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->fecha_inicio->format('d/m/Y')}}"  placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Numero de suscripcion  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->numero_suscripcion}}"  placeholder="">
  </div>

  <div class="col-md-6 form-group">
   <label for="">Punto de venta  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->punto_venta}}"  placeholder="">
  </div>
  <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" disabled rows="5" cols="80">{{$sus->observacion}}</textarea>
  </div>


</div>

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
    <input type="number" disabled  min="0" class="form-control" id="" name="jovenes" value="{{$sus->jovenes}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Adultos</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="adultos" value="{{$sus->adultos}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Niños</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="ninos" value="{{$sus->ninos}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Puerta a la palabra</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="puerta" value="{{$sus->puerta}}">
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
  <p class="title">USUARIO</p>
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
