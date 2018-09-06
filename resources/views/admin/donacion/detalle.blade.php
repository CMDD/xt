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
<h2> DONACION |</h2>
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
<span class="name"> PROGRAMA  </span>
<span class="value text-success"> {{$donacion->programa}}</span>
</li>
<li class="hidden-phone">
<span class="name"> Estado </span>
<span class="value text-success"> {{$donacion->estado}}</span>
</li>
<li class="hidden-phone">
<span class="name"> Fecha de inicio  </span>
<span class="value text-success">{{$donacion->fecha}} </span>
</li>
</ul>
<br />

<div id="mainb" style="height:350px;">
  <div class="col-md-6 form-group">
    <label for="">Nombre benefactor</label>
    <input disabled type="text" class="form-control" value="{{$donacion->nombre_benefactor}}" id="" name="nombre" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Titular</label>
    @if(isset($donacion->persona->nombres))
    <input disabled type="text" class="form-control" disabled value="{{$donacion->persona->nombres}}"  id="" name="correo" placeholder="">
    @else
    <input disabled type="text" class="form-control" disabled value="NN"  id="" name="correo" placeholder="">

    @endif
  </div>
  <div class="col-md-6 form-group">
    <label for="">Valor donado</label>
    <input disabled type="text" class="form-control" value="{{$donacion->valor}}" name="valor" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Canal de recaudo</label>
    <input disabled type="text" class="form-control" value="{{$donacion->recaudo}}" name="recaudo" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">No. Recibo de pago</label>
    <input disabled type="text" class="form-control" value="{{$donacion->recibo_pago}}" name="recibo_pago" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Fecha de la donación</label>
    <input disabled type="date" class="form-control" id="" value="{{$donacion->fecha}}" name="fecha" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input disabled type="text" class="form-control" value="{{$donacion->telefono}}" id="" name="telefono" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Celular</label>
    <input disabled type="text" class="form-control" value="{{$donacion->celular}}" id="" name="celular" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Programa</label>
   <input disabled type="text" class="form-control" name="" value="{{$donacion->programa}}">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Periocidad</label>
   <input disabled type="text" class="form-control" name="" value="{{$donacion->periocidad}}">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Estado</label>
   <input disabled type="text" class="form-control" name="" value="{{$donacion->estado}}">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input disabled type="text" class="form-control" value="{{$donacion->direccion}}" id="" name="direccion" placeholder="">
  </div>

  <div class="col-md-6 form-group">
   <label for="">Región</label>
   @if($donacion->municipio)
   <input disabled type="text" class="form-control" name="" value="{{$donacion->municipio->departamento->region->nombre}}">
   @else
   <input disabled type="text" class="form-control" name="" value="">
   @endif
  </div>
  <div class="col-md-6 form-group">
   <label for="">Departamento</label>
 @if($donacion->municipio)
     <input disabled type="text" class="form-control" name="" value="{{$donacion->municipio->departamento->nombre}}">
  @else
  <input disabled type="text" class="form-control" name="" value="">
  @endif
  </div>
  <div class="col-md-6 form-group">
   <label for="">Municipio</label>
   @if($donacion->municipio)
     <input disabled type="text" class="form-control" name="" value="{{$donacion->municipio->nombre}}">
    @else
    <input disabled type="text" class="form-control" name="" value="">
    @endif
  </div>

  <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" disabled rows="5" cols="80">{{$donacion->observacion}}</textarea>
  </div>


</div>

</div>

<!-- start project-detail sidebar -->
<div class="col-md-3 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>Descripción</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<h3 class="green"><i class="fa fa-book"></i> {{$donacion->oracional}}</h3>
<hr>

<div class="project_detail">

@if(isset($donacion->persona->nombres))

<p class="title">Titular</p>
<p>{{$donacion->persona->nombres}}</p>
<p class="title">Correo</p>
<p>{{$donacion->persona->correo}}</p>
<p class="title">Telefono</p>
<p>{{$donacion->persona->telefono}}</p>
</div>
@endif
<br />

<h3>Datos del usuario</h3>
<div class="project_detail">

<p class="title">Nombre</p>
<p>{{$donacion->usuario->name}}</p>
<p class="title">Correo</p>
<p>{{$donacion->usuario->email}}</p>
</div>

<br/>
@can('editar.suscripcion')
<div class="text-center mtop20">
<a href="{{route('editar.donaciones',$donacion->id)}}" class="btn btn-sm btn-primary">Editar</a>
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
