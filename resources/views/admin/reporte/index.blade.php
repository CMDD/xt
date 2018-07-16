@extends('layouts.admin')

@section('content')

<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>Reportes <small></small></h3>
</div>

<div class="title_right">
<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search for...">
<span class="input-group-btn">
<button class="btn btn-default" type="button">Go!</button>
</span>
</div>
</div>
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
<a href="#" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Imprimir </a>
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
