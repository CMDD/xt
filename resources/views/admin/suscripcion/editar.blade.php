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
 <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" name="direccion" value="{{$sus->direccion}}" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" name="especificacion_direccion" value="{{$sus->direccion_especificacion}}" placeholder="">
 </div>
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
   <label for="">Fecha de inicio : {{$sus->fecha_inicio->format('d/m/y')}} </label>
   <input type="date" class="form-control" id=""  name="fecha">
 </div>

 <div class="col-md-6 form-group">
   <label for="">Fecha de corte {{$sus->fecha_final->format('d/m/y')}} </label>
   <input  type="date"  class="form-control" id="" name="fecha_corte">
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
