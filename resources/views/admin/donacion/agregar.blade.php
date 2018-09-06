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
<div class="col-md-7 col-sm-9 col-xs-12">
<form class="" action="{{url('agregar-donacion',$persona->id)}}" method="post">
  {!!csrf_field()!!}
  <div class="col-md-6 form-group">
    <label for="">Nombre benefactor</label>
    <input type="text" class="form-control"  id="" name="nombre" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Apellidos</label>
    <input type="text" class="form-control"  id="" name="apellido" placeholder="">
  </div>
  

  <div class="col-md-6 form-group">
    <label for="">Valor donado</label>
       $<input type="number" min="0.00" step="0.01" class="form-control" required id="" name="valor" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Modo de recaudo</label>
    <select required class="form-control" name="recaudo">
      <option value="">Seleccione...</option>
      <option value="Efecty">Efecty</option>
      <option value="Web">Web</option>
      <option value="Banco">Banco</option>
      <option value="Efectivo">Efectivo</option>

    </select>
  </div>
  <div class="col-md-6 form-group">
    <label for="">No. Recibo de pago</label>
    <input type="text" class="form-control" id="" required name="recibo_pago" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Fecha de la donación</label>
    <input type="date" class="form-control" id="" required name="fecha" placeholder="">
  </div>

  <div class="col-md-6 form-group">
    <label for="">Teléfono</label>
    <input type="text" class="form-control" id="" name="telefono" placeholder="">
  </div>
  <div class="col-md-6 form-group">
    <label for="">Celular</label>
    <input type="text" class="form-control" id="" name="celular" placeholder="">
  </div>

 <div class="col-md-6 form-group">
   <label for="">Programa</label>
   <select required class="form-control" name="programa">
     <option value="">Seleccione...</option>
     <option value="Minuto de evangelizacion">Minuto de evangelización</option>
     <option value="Club de amigos">Club de amigos</option>
     <option value="Web">Web</option>
     <option value="Exporadico">Esporádico</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Periodicidad</label>
   <select required class="form-control" name="periocidad">
     <option value="">Seleccione...</option>
     <option value="15 Dias">15 días</option>
     <option value="30 Dias">30 días</option>
     <option value="Esporadico">Esporádito</option>
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" name="direccion" placeholder="">
 </div>
 <div class="col-md-6 form-group">
   <label for="">Región</label>
   <select  id="region" name="region" class="form-control">
     <option value="">Seleccione...</option>
     @foreach($regiones as $region)
     <option value="{{$region->id}}">{{$region->nombre}}</option>
     @endforeach
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Departamento</label>
   <select  id="departamento" name="departamento" class="form-control">
   </select>
 </div>
 <div class="col-md-6 form-group">
   <label for="">Municipio</label>
   <select  id="municipio" class="form-control" name="municipio">
   </select>
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

  <div class="col-md-5 col-sm-3 col-xs-12">

  <section class="panel">

  <div class="x_title">
  <h2>DETALLES DEL USUARIO</h2>
  <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div class="project_detail">
    <p class="title">TITULAR</p>
    <p>{{$persona->nombres}}</p>
    <p class="title">Correo</p>
    <p>{{$persona->correo}}</p>
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
