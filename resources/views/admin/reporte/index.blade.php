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
<h2>IXTUS</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<p></p>
<!-- start project list -->
<table class="table table-striped projects">
<thead>
<tr>
<th style="width: 10%">Reporte</th>
<th style="width: 10%">Descripión</th>
<th style="width: 10%">Estado</th>
<th style="width: 10%">Acción</th>
</tr>
</thead>
<tbody>
<tr>
<td>Cantidades totales</td>
<td>
 <a>Muestra las totalidad de los registros</a>
<br/>
<small>Fecha:</small>
</td>
</td>
<td>
<button type="button" class="btn btn-success btn-xs">Activo</button>
</td>
<td>
<a href="{{url('totales')}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Ver </a>
</td>
</tr>
<tr>
<td>Reporte por parametros</td>
<td>
 <a>Reporte personalizado</a>
<br/>
<small>Fecha:</small>
</td>
</td>
<td>
<button type="button" class="btn btn-success btn-xs">Activo</button>
</td>
<td>
<a href="" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Ver </a>
</td>
</tr>
</tbody>
</table>
<!-- end project list -->
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
