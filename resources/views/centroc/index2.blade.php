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
        <div class="col-md-8 col-sm-12 col-xs-12">
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
              <th>NOMBRES</th>
              <th>APELLIDOS</th>
              <!-- <th>DOCUMENTOS</th> -->
              <th>ULTIMO CONTACTO</th>
              <th>ACCION</th>
              </tr>
              </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Seguimiento <small>ixtus</small></h2>
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


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pendientes</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">No contestan</a>
                                            </li>

                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
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

@section('scripts')
<!-- Datatables -->
{{ Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}
{{ Html::script('admin/js/datatables/tools/js/dataTables.tableTools.js') }}
<script>
$(document).ready(function () {
  oTable = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": "{{ url('get_titulares') }}",
            "columns": [
                {data: 'estado', name: 'estado'},
                {data: 'nombres', name: 'nombres'},
                {data: 'apellidos', name: 'apellidos'},
                // {data: 'numero_documento', name: 'numero_documento'},
                {data: 'updated_at', name: 'updated_at'},
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
