@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>AGREGAR SUSCRIPCIÓN</h3>
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

<form class="" action="{{url('agregar-suscripcion',$persona->id)}}" method="post">
  {!!csrf_field()!!}


  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input required type="text" class="form-control" id="" name="nombre_recibe" value="" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" id="" name="telefono" value="" placeholder="">
  </div>

 <div class="col-md-6 form-group">
   <label for="">Plan</label>
   <select required class="form-control" name="plan">
     <option value="">Seleccione...</option>
     <option value="6">6 Meses</option>
     <option value="12">1 Año</option>
   </select>
 </div>

 <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input required type="text" class="form-control" id="" name="direccion" value="" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" name="especificacion_direccion" value="" placeholder="">
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
   <label for="">Minicipio</label>
   <select required id="municipio" class="form-control" name="municipio">
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Fecha de suscripcion  </label>
   <input required type="date" class="form-control" id="" name="fecha"  placeholder="">
 </div>
 <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" rows="5" cols="80"></textarea>
 </div>
 <input type="hidden" name="persona_id" value="{{$persona->id}}">
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
  <h2>ORACIONALES</h2>
  <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div class="col-md-6 form-group">
      <label for=""><i class="fa fa-book"></i>Jovenes</label>
      <input type="number"  min="0" class="form-control" id="" name="jovenes" value="0">
    </div>
    <div class="col-md-6 form-group">
      <label for=""><i class="fa fa-book"></i>Adultos</label>
      <input type="number"  min="0" class="form-control" id="" name="adultos" value="0">
    </div>
    <div class="col-md-6 form-group">
      <label for=""><i class="fa fa-book"></i>Niños</label>
      <input type="number"  min="0" class="form-control" id="" name="ninos" value="0">
    </div>
    <div class="col-md-6 form-group">
      <label for=""><i class="fa fa-book"></i>Puerta a la palabra</label>
      <input type="number"  min="0" class="form-control" id="" name="puerta" value="0">
    </div>
  <hr>
  <br />
  <br/>

  </div>

  </section>

  </div>
  </form>
  <div class="col-md-5 col-sm-3 col-xs-12">

  <section class="panel">

  <div class="x_title">
  <h2>DETALLES DEL TITULAR</h2>
  <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div class="project_detail">
    <p class="title">TITULAR</p>
    <p>{{$persona->name}}</p>
    <p class="title">Correo</p>
    <p>{{$persona->correo}}</p>
    <p class="title">Telefono</p>
    <p>{{$persona->telefono}}</p>
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
    <p>{{$persona->usuario->name}}</p>
    <p class="title">Correo</p>
    <p>{{$persona->usuario->email}}</p>
    <p class="title">Telefono</p>
    <p>{{$persona->usuario->telefono}}</p>
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
