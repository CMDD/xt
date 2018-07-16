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
<div class="col-md-9 col-sm-9 col-xs-12">

<form class="" action="{{url('crear-suscripcion')}}" method="post">
  {!!csrf_field()!!}
  <div class="col-md-6 form-group">
    <label for="">Cantidad</label>
    <input type="number" class="form-control" id="" name="cantidad" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input type="text" class="form-control" id="" name="nombre_recibe" value="" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" id="" name="telefono" value="" placeholder="">
  </div>
 <div class="col-md-6 form-group">
   <label for="">Oracional</label>
   <select class="form-control" name="oracional">
     <option  value="">Seleccione...</option>
     <option value="Jovenes">Jovenes</option>
     <option value="Aldultos">Adultos</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Plan</label>
   <select class="form-control" name="plan">
     <option value="">Seleccione...</option>
     <option value="6">6 Meses</option>
     <option value="12">1 Año</option>
   </select>
 </div>

 <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" name="direccion" value="" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" name="especificacion_direccion" value="" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Región</label>
   <select name="region" class="form-control">
     <option value="">Seleccione...</option>

   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Ciudad</label>
   <select class="form-control" name="ciudad">
     <option value="">Seleccione...</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Fecha de suscripcion  </label>
   <input type="date" class="form-control" id="" name="fecha"  placeholder="">
 </div>
 <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" rows="5" cols="80"></textarea>
 </div>
 <input type="hidden" name="persona_id" value="{{$persona->id}}">
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
<h2>Información del titular</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<h3 class="green"><i class="fa fa-book"></i> </h3>

<p></p>
<br/>

<div class="project_detail">

<p class="title">Usuario</p>
<p>{{$persona->nombres}}</p>
<p class="title">Correo</p>
<p>{{$persona->correo}}</p>
<p class="title">Telefono</p>
<p>{{$persona->telefono}}</p>
<p class="title">Dirección</p>
<p>{{$persona->direccion}}</p>
</div>
<br />
<h3></h3>

<br/>
<div class="text-center mtop20">

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
