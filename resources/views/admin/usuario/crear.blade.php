  @extends('layouts.admin')
  @section('content')
  <!-- page content -->
  <div class="right_col" role="main">
  <div class="">
  <div class="page-title">
  <div class="title_left">
  <h3>CREAR USUARIOS</h3>
  </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
  <div class="col-md-6 col-xs-12">
  <div class="x_panel">
  <div class="x_title">
  <h2>CREAR USUARIOS<small>Ixtus</small></h2>
  <ul class="nav navbar-right panel_toolbox">
  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
  </li>
  <li><a class="close-link"><i class="fa fa-close"></i></a>
  </li>
  </ul>
  <div class="clearfix"></div>
  </div>
  <div class="x_content">
  <br />
  <form class="form-horizontal form-label-left input_mask" action="{{url('usuario-crear')}}" method="post">
    {!!csrf_field()!!}

  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" value="{{old('nombres')}}"  required class="form-control has-feedback-left" id="inputSuccess2" name="nombres" placeholder="Nombres">
  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" value="{{old('apellidos')}}" required class="form-control" name="apellidos" placeholder="Apellidos">
  <span class="fa fa-user form-control-feedback right"  aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="email" value="{{old('email')}}" required class="form-control has-feedback-left" name="email" id="inputSuccess4" placeholder="Email">
  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
  @if ($errors->has('email'))
      <span class="invalid-feedback">
          <strong style="color:red;" >{{ $errors->first('email') }}</strong>
      </span>
  @endif

  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" value="{{old('telefono')}}" class="form-control" id="inputSuccess5" name="telefono" placeholder="Teléfono">
  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" value="{{old('cedula')}}"  class="form-control has-feedback-left" name="cedula"  placeholder="No. Identificacion">
  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" required class="form-control" id="inputSuccess5" name="pass" placeholder="Contraseña">
  <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
  </div>


<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Regional</label>
  <div class="col-md-9 col-sm-9 col-xs-12">
      <select required name="region" class="form-control">
          <option  value="">Seleccione...</option>
          @foreach($regiones as $region)
          <option value="{{$region->id}}">{{$region->nombre}}</option>
          @endforeach

      </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo</label>
  <div class="col-md-9 col-sm-9 col-xs-12">
      <select name="cargo" class="form-control">
          <option value="" >Seleccione...</option>
          @foreach($cargos as $cargo)
          <option value="{{$cargo->nombre}}">{{$cargo->nombre}}</option>
          @endforeach

      </select>
  </div>
</div>


<hr>
<div class="form-group">
    <h4>ROLES</h4>
  @foreach($roles as $role)
  <div class="checkbox">
  <label>
    {{Form::checkbox('roles[]',$role->id,null)}}
    {{$role->name}}
  </label>
  </div>
  @endforeach
</div>



  <div class="ln_solid"></div>
  <div class="form-group">
  <div class="col-md-9 col-sm-9 col-xs-12">
  <button type="submit" class="btn btn-primary">CREAR</button>
  </div>
  </div>
  </form>
  </div>
  </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
  <div class="x_title">
  <h2>USUARIOS <small></small></h2>
  <div class="clearfix"></div>
  </div>

  <div class="x_content">
    <table id="example" class="table table-striped responsive-utilities jambo_table">
    <thead>
    <tr class="headings">
    <th>ID</th>
    <th>NOMBRE</th>
    <th>EMAIL</th>
    <th >ACCIÓN</th>
    </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $user)
    <tr class="even pointer">
    <td class=" ">{{$user->id}}</td>
    <td class=" ">{{$user->name}}</td>
    <td class=" ">{{$user->email}}</td>
    <td class=" last">
    <a href="{{route('editar.usuario',$user->id)}}">
    <button type="button" style="width:100%;" class="btn btn-default" name="button">Editar</button>
    </a>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>

  </div>
  </div>
  </div>
  </div>
  <!-- /page content -->
  </div>
  @section('scripts')
  <!-- Datatables -->
  {{ Html::script('admin/js/datatables/js/jquery.dataTables.js') }}

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
  'iDisplayLength': 12,
  "sPaginationType": "full_numbers",
  "dom": 'T<"clear">lfrtip',
  "tableTools": {
  "sSwfPath": ""
  }
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
