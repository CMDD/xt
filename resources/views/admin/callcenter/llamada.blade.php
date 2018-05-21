@extends('layouts.admin')
@section('style')
{{ Html::style('admin/css/datatables/tools/css/dataTables.tableTools.css')}}
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>LLAMADAS |<small>IXTUS</small></h2>
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
<th>
ID
</th>
<th>AUDIO</th>
<th>DURACION</th>
<th>FECHA</th>
<th class=" no-link last"><span class="nobr">ACCION</span>
</th>
</tr>
</thead>
<tbody>
  @forelse($llamadas as $p)
<tr class="even pointer">
<td class="  ">
{{$p->id}}
</td>
<td class=" ">
  <div class="x_content">
  <audio  id="pista" autostart="false"  src="{{$p->RecordingUrl}}" > Su navegador no soporta la etiqueta audio.</audio>
  <a onclick="document.getElementById('pista').play()" class="btn btn-app">
      <i class="fa fa-play"></i> Play
  </a>
  <a onclick="document.getElementById('pista').pause()"  class="btn btn-app">
      <i class="fa fa-pause"></i> Pause
  </a>
  <a href="{{$p->RecordingUrl}}" download="audio"   class="btn btn-app">
      <i class="fa fa-download"></i> Descargar
  </a>
  </div>
</td>
<td>{{$p->RecordingDuration}} Segundos</td>
<td>{{$p->created_at}}</td>
<td class=" last">
<a href="{{url('crear-persona',$p->id)}}">
  <button type="button" class="btn btn-default"
    data-toggle="tooltip" data-placement="left" >CREAR PERSONA
  </button>
</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
<br/>
<br/>
<br/>
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
radioClass: 'iradio_flat-green',
});
});

var asInitVals = new Array();
$(document).ready(function () {
var oTable = $('#example').dataTable({
  "aaSorting": [[ 3, "desc"]],
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

'aTargets': [0],
} //disables sorting for column one
],
'iDisplayLength': 12,
"sPaginationType": "full_numbers",
"dom": 'T<"clear">lfrtip',
"tableTools": {
"sSwfPath": ""
},

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
