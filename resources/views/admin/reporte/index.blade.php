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

  <form class="" action="{{url('reporteTitulares')}}" method="post">

{!!csrf_field()!!}

  <div class="col-md-2">
    <div class="form-group">
      <label for="">Tipo de reporte</label>
      <select required class="form-control" name="tipo">
        <option value="">Seleccione...</option>
        <option value="cantidades">Cantidades</option>
        <option value="listado">Listado</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Region</label>
      <select required class="form-control" name="region">
        <option value="">Seleccione...</option>
        @foreach($regiones as $region)
        <option value="{{$region->nombre}}">{{$region->nombre}}</option>
        @endforeach

      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Estado</label>
      <select required class="form-control" name="estado">
        <option value="">Seleccione...</option>
        <option value="Activo">Activos</option>
        <option value="Desactivo">Desactivos</option>
      </select>
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="">Desde</label>
      <input required class="form-control" type="date" name="desde" value="">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Hasta</label>
      <input required class="form-control" type="date" name="hasta" value="">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Accion</label>
      <input  class="form-control btn btn-primary" type="submit" name="" value="Buscar">
    </div>
  </div>
</form>
</div>


</div>
</div>
</div>

@if(isset($cantidad) and $cantidad)



<div class="col-md-12 col-sm-12 col-xs-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Reporte de Cantidades</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Settings 1</a>
</li>
<li><a href="#">Settings 2</a>
</li>
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="dashboard-widget-content">

<div class="col-md-3 hidden-small">
<h2 class="line_30">Titulares</h2>

<table class="countries_list">
<tbody>
<tr>
<td>Total</td>
<td class="fs15 fw700 text-right"></td>
</tr>

<tr>
<td>Provedor</td>
<td class="fs15 fw700 text-right"></td>
</tr>
<tr>
<td>Suscriptor</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
<tr>
<td>Comunidad</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
<tr>
<td>Empleado/aprendiz/Practicante</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
<tr>
<td>Oyente</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
</tbody>
</table>
</div>
<div class="col-md-3 hidden-small">
<h2 class="line_30"></h2><br><br>

<table class="countries_list">
<tbody>
<tr>
<td>Benefactor</td>
<td class="fs15 fw700 text-right">0</td>
</tr>

<tr>
<td>Cliente</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
<tr>
<td>Alumno</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
<tr>
<td>Asistente</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
<tr>
<td>Sevidor</td>
<td class="fs15 fw700 text-right">0</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endif





</div>
</div>
















<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->
</div>
<!-- /page content -->
@endsection
