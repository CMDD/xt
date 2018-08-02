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
        <option value="Todas">Todas</option>
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
<td class="fs15 fw700 text-right">{{$valores['total']}}</td>
</tr>
<tr>
<td>Comunidad</td>
<td class="fs15 fw700 text-right">{{$valores['total'] - ($valores['empleado']+$valores['proveedor'])}}</td>
</tr>

<tr>
<td>Provedor</td>
<td class="fs15 fw700 text-right">{{$valores['proveedor']}}</td>
</tr>
<tr>
<td>Empleado/aprendiz/Practicante</td>
<td class="fs15 fw700 text-right">{{$valores['empleado']}}</td>
</tr>
<tr>
<td>Suscriptor</td>
<td class="fs15 fw700 text-right">{{$valores['suscriptor']}}</td>
</tr>


<tr>
<td>Oyente</td>
<td class="fs15 fw700 text-right">{{$valores['oyente']}}</td>
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
<td class="fs15 fw700 text-right">{{$valores['benefactor']}}</td>
</tr>

<tr>
<td>Cliente</td>
<td class="fs15 fw700 text-right">{{$valores['cliente']}}</td>
</tr>
<tr>
<td>Alumno</td>
<td class="fs15 fw700 text-right">{{$valores['alumno']}}</td>
</tr>
<tr>
<td>Asistente</td>
<td class="fs15 fw700 text-right">{{$valores['asistente']}}</td>
</tr>
<tr>
<td>Sevidor</td>
<td class="fs15 fw700 text-right">{{$valores['servidor']}}</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endif

@if(isset($listado) and $listado)

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>LISTA |<small>IXTUS</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a href="#"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="#"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<table id="example" class="table table-striped responsive-utilities jambo_table">
<thead>
<tr class="headings">
<th style="width:10%;" >
ESTADO
</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>CORREO</th>
<th>TÉLEFONO/CELULAR</th>
<th >ACCIÓN | AGREGAR
</th>
</tr>
</thead>
<tbody>
  @forelse($personas as $p)
<tr class="even pointer">
<td  class="">
  {{$p->estado}}
</td>
<td class=" ">{{$p->nombres}}</td>
<td class=" ">{{$p->apellidos}}</td>
<td class="a-right a-right ">{{$p->correo}}</td>
<td class="a-right a-right ">{{$p->telefono}}</td>
<td class=" last">
  @can('ver.titular')
<a href="{{url('detalle',$p->id)}}">
  <button type="button" class="btn btn-sm btn-default"
  data-toggle="tooltip" data-placement="left" >VER
  </button>
</a>
@endcan
@can('editar.titular')
<a href="{{url('editar',$p->id)}}">
  <button type="button" class="btn btn-sm btn-default "
  data-toggle="tooltip" data-placement="left" >EDITAR
  </button>
</a>
@endcan
@can('crear.suscripcion')
<a href="{{route('agregar.suscripcion',$p->id)}}">
  <button type="button" class="btn btn-sm btn-default "
  data-toggle="tooltip" data-placement="left" > SUSCRIPCIÓN
  </button>
</a>
@endcan
@can('crear.donacion')
<a href="{{route('agregar.suscripcion',$p->id)}}">
  <button type="button" class="btn btn-sm btn-default "
  data-toggle="tooltip" data-placement="left" > DONACION
  </button>
</a>
@endcan
</td>
</tr>
@endforeach
</tbody>
</table>
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

@section('scripts')
<!-- Datatables -->
{{ Html::script('admin/js/datatables/js/jquery.dataTables.js') }}
{{ Html::script('admin/js/datatables/tools/js/dataTables.tableTools.js') }}
<script>
$(document).ready(function () {
$('input.tableflat').iCheck({
checkboxClass: 'icheckbox_flat-green',
radioClass: 'iradio_flat-green'
});
});

var asInitVals = new Array();
$(document).ready(function () {
var oTable = $('#example').dataTable({
"oLanguage": {
"sProcessing":     "Procesando...",
"sLengthMenu":     "Mostrar _MENU_ registros",
"sZeroRecords":    "No se encontraron resultados",
"sEmptyTable":     "Ningún dato disponible en esta tabla",
"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
"sInfoPostFix":    "",
"sSearch":         "Buscar:",
"sUrl":            "",
"sInfoThousands":  ",",
"sLoadingRecords": "Cargando...",
"oPaginate": {
"sFirst":    "Primero",
"sLast":     "Último",
"sNext":     "Siguiente",
"sPrevious": "Anterior"
},
"oAria": {
"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
"sSortDescending": ": Activar para ordenar la columna de manera descendente"
}
},
"aoColumnDefs": [
{
'bSortable': false,
'aTargets': [0]
} //disables sorting for column one
],

});
$("tfoot input").keyup(function () {
/* Filter on the column based on the index of this element's parent <th> */
oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
});
$("tfoot input").each(function (i) {
asInitVals[i] = this.value;
});
$("tfoot input").focus(function () {
if (this.className == "search_init") {
this.className = "";
this.value = "";
}
});
$("tfoot input").blur(function (i) {
if (this.value == "") {
this.className = "search_init";
this.value = asInitVals[$("tfoot input").index(this)];
}
});
});
</script>
@endsection
@endsection
