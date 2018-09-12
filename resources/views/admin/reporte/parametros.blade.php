@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>Reportes <small></small></h3>
</div>

</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2>TITULARES</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<div class="row">

  <div class="col-md-2">
    <div class="form-group">
      <label for="">Tipo de reporte</label>
      <select class="form-control" name="">
        <option value="[object Object]">Seleccione...</option>
        <option value="[object Object]">Cantidades</option>
        <option value="">Listado</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Region</label>
      <select class="form-control" name="">
        <option value="[object Object]">Seleccione...</option>
        @foreach($regiones as $region)
        <option value="">{{$region->nombre}}</option>
        @endforeach

      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Estado</label>
      <select class="form-control" name="">
        <option value="[object Object]">Seleccione...</option>
        <option value="">Activos</option>
        <option value="">Desactivos</option>
      </select>
    </div>
  </div>
  
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Desde</label>
      <input class="form-control" type="date" name="" value="">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Hasta</label>
      <input class="form-control" type="date" name="" value="">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Accion</label>
      <input class="form-control btn btn-primary" type="submit" name="" value="Buscar">
    </div>
  </div>

</div>
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
