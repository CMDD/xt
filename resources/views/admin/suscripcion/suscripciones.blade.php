@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>SUSCRIPCIONES<small></small></h3>
</div>


</div>
<div class="clearfix"></div>

<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2>Projects</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<!-- start project list -->
<table class="table table-striped projects">
<thead>
<tr>
<th style="width: 1%">ID</th>
<th style="width: 20%">PLAN</th>
<th>CANTIDAD</th>
<th>ORACIONAL</th>
<th>FINALIZA</th>
<th>ESTADO</th>
<th style="width: 20%">ACCIÓN</th>
</tr>
</thead>
<tbody>
  @foreach($sus as $su)
<tr>
<td>{{$su->id}}</td>
<td>
<a>{{$su->plan}}</a>
</td>
<td>
<a>{{$su->cantidad}}</a>
</td>
<td>
<a>{{$su->oracional}}</a>
</td>
<td class="project_progress">
<div class="progress progress_sm">
<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
</div>
<small>37% Completado</small>
</td>
<td>
<button type="button" class="btn btn-success btn-xs">Activo</button>
</td>
<td>
<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
</td>
</tr>
@endforeach


</tbody>
</table>
<!-- end project list -->

</div>
</div>
</div>
</div>
</div>

<!-- footer content -->

<!-- /footer content -->

</div>
<!-- /page content -->
@endsection
