@extends('layouts.admin')
@section('style')
<!-- select2 -->
<link href="admin/css/select/select2.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <br>
    <br>
    <div class=" alert alert-danger invalid-feedback">{{ $error }}</div>
    @endforeach
    @endif
    <div class="page-title">
      <div class="title_left">
      <h3>Nuevo Registro</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>CRM - MD | Datos básicos <small></small></h2>
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
          <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="{{url('crear-persona')}}" method="post">
            {!!csrf_field()!!}
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="nombres" class="form-control" required>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="apellidos" class="form-control " >
          </div>
          </div>


          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de persona *</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="tipo_persona[]" required class="select2_multiple form-control" multiple="multiple">
            <option value="Benefactor" >Benefactor</option>
            <option value="Empleado" >Empleado</option>
            <option value="Servidores" >Servidores</option>
            <option value="Cliente" >Cliente</option>
            <option value="Proveedor" >Proveedor</option>
          </select>
            @if($errors->has('tipo_persona'))
            @foreach($errors->get('tipo_persona') as $error)
                <div class=" alert alert-danger invalid-feedback">{{ $error }}</div>
            @endforeach
            @endif
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <select name="tipo_documento" class="form-control">
          <option value="" >Seleccione...</option>
          <option value="CC" >CC</option>
          <option value="CE" >CE</option>
          <option value="TI">TI</option>
          </select>
          </div>
          <div class="col-md-6 col-sm-9 col-xs-12">
          <input name="numero_documento" type="text" class="form-control" placeholder="Número">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de nacimiento</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input name="fecha_nacimiento" type="text" class="form-control" placeholder="DD-MM-AA">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input name="correo" required type="email" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico (Alternativo)</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input name="correo_alternativo" type="email" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="direccion" type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Especificación de Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="direccion_especificacion" type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <input name="ciudad" type="text" class="form-control" placeholder="">
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Paìs</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <input name="pais" type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Télefono/Celular</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <input name="telefono" type="text" class="form-control" placeholder="">
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Alternativo</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <input name="telefono_alternativo" type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupación</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="ocupacion" type="text" class="form-control " placeholder="">
          </div>
          </div>

          <div class="form-group">
          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Preferencias
          </label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input name="preferencias[]"  type="checkbox" value="Retiros/Eventos"> Retiros/Eventos
          </label>
          </div>
          <div class="checkbox">
          <label>
          <input name="preferencias[]"  type="checkbox" value="Radio"> Radio
          </label>
          </div>
          </div>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input name="preferencias[]" type="checkbox" value="Tienda/Libreria"> Tienda/Libreria
          </label>
          </div>
          <div class="checkbox">
          <label>
          <input name="preferencias[]"  type="checkbox" value="Novedades/Ofertas"> Novedades/Ofertas
          </label>
          </div>
          </div>
          <div class="col-md-2 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input name="preferencias[]"  type="checkbox" value="Apps"> Apps
          </label>
          </div>
          <div class="checkbox">
          <label>
          <input name="preferencias[]"  type="checkbox" value="General"> General
          </label>
          </div>
          </div>

          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <button style="width: 100% " type="submit" class="btn btn-success">Crear</button>
          </div>
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
      <h2>Autorizaciones</h2>
      <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
      </ul>
      <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <br/>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Planilla</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
      <input name="numero_planilla" type="text" class="form-control" placeholder="">
      </div>
      </div>
      <div style="margin-top:8%;" class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Registro</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
      <input name="numero_registro" type="text" class="form-control" placeholder="">
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
      <h2>Archivos de Voz</h2>
      <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
      </ul>
      <div class="clearfix"></div>
      </div>
      <input type="file" name="voz" value="">
      </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          <h2>Imagen</h2>
          <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
          </ul>
          <div class="clearfix"></div>
          </div>
          <input type="file" name="imagen" >
        </div>
      </div>

      <button onclick="mostrarSuscripcion()" class="btn btn-primary btn-suscripcion" type="button" name="button">Crear suscripción</button>

      <div id="panel-suscripcion" class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          <h2>El Man está Vivo - Suscripción </h2>
          <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
          </ul>
          <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label class="">Cantidad</label>
              <input class="input-cantidad" type="number" name="cantidad" min="1" value="">
            </div>
            <div class="col-md-3">
              <label class="">Oracional</label>
              <select name="oracional"  class="form-contro select-oracional">
                <option value="" >Seleccione</option>
                <option value="Jóvenes" >Jóvenes</option>
                <option value="Adultos" >Adultos</option>
                <option value="Niños" >Niños</option>
                <option value="Puerta a la palabra" >Puerta a la palabra</option>

              </select>
            </div>
            <div class="col-md-3">
              <label class="">Tipo</label> <br>
              <select name="plan"  class="form-contro select-oracional">
               <option value="" >Seleccione</option>
               <option value="6" >6 meses</option>
               <option value="12" >1 año</option>

              </select>
            </div>
            <div class="col-md-3">
              <label class="">Fecha suscripcion</label> <br>
              <input class="input-fecha" type="date" name="fecha_suscripcion" value="">
            </div>

          </div>
          <hr>
          <div class="row">
          <label>Direccion de envío</label><br>
              <p>
                  <input type="radio"  name="direccion_radio"  value="misma"/>
                  Misma dirección inicial:

                  <input type="radio" name="direccion_radio"  value="otra" />
                  Otra dirección:
              </p>
            <div class="col-md-12">
              Nombre de quien recibe <br>
              <input class="nombre-recibe" type="text" name="nombre_recibe" value="" >
            </div>

            <div class=" direccion-suscripcion col-md-6">
              Dirección <br>
              <input class="nombre-recibe" type="text" name="direccion_suscripcion" value="" >
            </div>

            <div class="direccion-suscripcion col-md-6">
                Especificaciones de dirección <br>
              <input class="nombre-recibe" type="text" name="especificacion_direccion_suscripcion" value="">
            </div>
            <div class="direccion-suscripcion col-md-6">
              Ciudad <br>
              <input class="nombre-recibe" type="text" name="ciudad_suscripcion" value="">
            </div>
            <div class="direccion-suscripcion col-md-6">
              País <br>
              <input class="nombre-recibe" type="text" name="pais_suscripcion" value="">
            </div>

            <div class="direccion-suscripcion col-md-12">
              Observaciones <br>
              <textarea name="observacion_suscripcion"  class="form-control"  data-parsley-trigger="keyup" data-parsley-minlength="20"
               data-parsley-maxlength="100" ></textarea>
            </div>

       </div>
        </div>
      </div>
      </form>
    </div>
  </div>
<!-- /page content -->
<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->
</div>
@section('scripts')
<!-- select2 -->
<script src="admin/js/select/select2.full.js"></script>
<!-- select2 -->

<script>
  $(document).ready(function () {
  $(".select2_single").select2({
      placeholder: "Select a state",
      allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
      placeholder: "Puede seleccionar varios tipos!",
      requerid:true,
      allowClear: true
    });
  });
</script>
<!-- /select2 -->
@endsection
@endsection
