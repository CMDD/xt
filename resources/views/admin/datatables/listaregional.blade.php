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
            <h2>|<small>IXTUS</small></h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="example" class="table responsive nowrap table-striped responsive-utilities jambo_table" style="width:100%">
              <thead>
              <tr>
              <th>ESTADO</th>
              <th># PLANILLA</th>
              <th>NOMBRES</th>
              <th>APELLIDOS</th>
              <th>DOCUMENTOS</th>
              <th>TELÉFONO</th>
              <th>ACCION</th>
              </tr>
              </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
   <input type="hidden" name="id" id="region_id" value="{{Auth::User()->region_id}}">
    <!-- footer content -->
    @include('layouts.footer')
    <!-- /footer content -->
</div>

<!-- /page content -->

@section('scripts')
<!-- Datatables -->
{{ Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}
{{ Html::script('admin/js/datatables/tools/js/dataTables.tableTools.js') }}
<script>
$(document).ready(function () {
  var id = $('#region_id').val();
  console.log(id);
  oTable = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": "/api/reporte-regional/"+ id,
            "columns": [
                {data: 'estado', name: 'estado'},
                {
                  data: 'numero_registro',
                   name:'numero_registro',
                   render:function(data, type, row, meta){
                     return row.numero_registro + ' ' + row.numero_planilla;
                   }
                },
                {data: 'nombres', name: 'nombres'},
                {data: 'apellidos', name: 'apellidos'},
                {data: 'numero_documento', name: 'numero_documento'},
                {data: 'telefono', name: 'telefono'},
                {data:'btn'}
            ],
            language: {
                    url: "{{ asset('css/Spanish.json') }}"
                }
        });
});
</script>
@endsection
@endsection
