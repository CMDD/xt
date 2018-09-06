@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>DONACIONES</h3>
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

<form class="" action="{{url('update_donaciones',$donacion->id)}}" method="post">
  {!!csrf_field()!!}
  <div class="col-md-6 form-group">
    <label for="">Nombre benefactor</label>
    <input type="text" class="form-control" value="{{$donacion->nombre_benefactor}}" id="" name="nombre" placeholder="">
  </div>
  @if(isset($donacion->persona->nombres))
  <div class="col-md-6 form-group">
    <label for="">Titular</label>

    <input type="text" class="form-control" disabled value="{{$donacion->persona->nombres}}"  id="" name="correo" placeholder="">

  </div>
  @endif
  <div class="col-md-6 form-group">
    <label for="">Valor donado</label>
    <input type="text" class="form-control" value="{{$donacion->valor}}" name="valor" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Canal de recaudo</label>
    <select required class="form-control" name="recaudo">
      <option value="{{$donacion->recaudo}}">{{$donacion->recaudo}}</option>
      <option value="Efecty">Efecty</option>
      <option value="Web">Web</option>
      <option value="Banco">Banco</option>
      <option value="Efectivo">Efectivo</option>

    </select>
  </div>
  <div class="col-md-6 form-group">
    <label for="">No. Recibo de pago</label>
    <input type="text" class="form-control" value="{{$donacion->recibo_pago}}" name="recibo_pago" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Fecha de la donación</label>
    <input type="date" class="form-control" id="" value="{{$donacion->fecha}}" name="fecha" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" value="{{$donacion->telefono}}" id="" name="telefono" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Celular</label>
    <input type="text" class="form-control" value="{{$donacion->celular}}" id="" name="celular" placeholder="">
  </div>
 <div class="col-md-6 form-group">
   <label for="">Programa</label>
   <select class="form-control" name="programa">
     <option value="{{$donacion->programa}}">{{$donacion->programa}}</option>
     <option value="Minuto de evangelización">Minuto de evangelización</option>
     <option value="Club de amigos">Club de amigos</option>
     <option value="Web">Web</option>
     <option value="Esporadico">Esporádico</option>
   </select>
 </div>

 <div class="col-md-6 form-group">
   <label for="">Periocidad</label>
   <select required class="form-control" name="periocidad">
     <option value="{{$donacion->periocidad}}">{{$donacion->periocidad}} </option>
     <option value="15 Dias">15 días</option>
     <option value="30 Dias">30 días</option>
     <option value="Esporadico">Esporádito</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Estado</label>
   <select class="form-control" name="estado">
     <option value="{{$donacion->estado}}">{{$donacion->estado}}</option>
     <option value="Activo">Activo</option>
     <option value="Desactivo">Desactivo</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" value="{{$donacion->direccion}}" id="" name="direccion" placeholder="">
 </div>

 <div class="col-md-6 form-group">
   <label for="">Región</label>
   <select  id="region" name="region" class="form-control">
      @if($donacion->municipio)
     <option value="">{{$donacion->municipio->departamento->region->nombre}}</option>
     @else
     <option value="">Seleccione...</option>
     @endif
     @foreach($regiones as $region)
     <option value="{{$region->id}}">{{$region->nombre}}</option>
     @endforeach

   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Departamento</label>
   <select  id="departamento" name="departamento" class="form-control">
     @if($donacion->municipio)
    <option value="">{{$donacion->municipio->departamento->nombre}}</option>
    @else
    <option value="">Seleccione...</option>
    @endif
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Minicipio</label>
   <select  id="municipio" class="form-control" name="municipio">
     @if($donacion->municipio)
    <option value="">{{$donacion->municipio->nombre}}</option>
    @else
    <option value="">Seleccione...</option>
    @endif
   </select>
 </div>

 <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" rows="5" cols="80">{{$donacion->observacion}}</textarea>
 </div>
 <div class="col-md-9 form-group">
   <input type="submit" class="btn btn-primary" name="" value="ACTUALIZAR">
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

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
   sed do eiusmod tempor incididunt ut labore et dolore magna
   aliqua. Ut enim ad minim veniam, quis nostrud exercitation
    ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit
     esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia
      deserunt mollit anim id est laborum.</p>
<br />

<br />

@can('editar.suscripcion')
<div class="text-center mtop20">
<a href="{{route('eliminar.donacion',$donacion->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn  btn-danger">Eliminar donacion</a>
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
