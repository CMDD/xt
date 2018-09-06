@extends('layouts.admin')
@section('style')
<!-- select2 -->
{!!Html::style('admin/css/select/select2.min.css')!!}
@endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <!-- @if($errors->any())
    @foreach($errors->all() as $error)
    <br>
    <br>
    <div class=" alert alert-danger invalid-feedback">{{ $error }}</div>
    @endforeach
    @endif -->
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
          <input type="text" name="nombres" class="form-control" value="{{old('nombres')}}" required>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input required type="text" name="apellidos" value="{{old('apellidos')}}" class="form-control " >
          </div>
          </div>

          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <select name="tipo_documento" class="form-control">
          <option value="CC" >CC</option>
          <option value="CE" >CE</option>
          <option value="TI">TI</option>

          </select>
          </div>
          <div class="col-md-6 col-sm-9 col-xs-12">
          <input name="numero_documento" type="text" value="{{ old('numero_documento') }}" class="form-control{{ $errors->has('numero_documento') ? ' is-invalid' : '' }}" placeholder="Número">
          @if ($errors->has('numero_documento'))
              <span class="invalid-feedback">
                  <strong style="color:red;" >{{ $errors->first('numero_documento') }}</strong>
              </span>
          @endif
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de nacimiento</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}"  type="date" class="form-control" placeholder="DD-MM-AA">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input name="correo" value="{{old('correo')}}" type="email" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico (Alternativo)</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input name="correo_alternativo" value="{{old('correo_alternativo')}}" type="email" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="direccion" type="text" value="{{old('direccion')}}" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Especificación de Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="direccion_especificacion" value="{{old('direccion_especificacion')}}" type="text" class="form-control" placeholder="">
          </div>
          </div>

          <div class="form-group">

          <label class="control-label col-md-3 col-sm-3 col-xs-12">Región</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
            <select id="region" class=" form-control" name="region">
              <option value="">Seleccione...</option>
              @foreach($regiones as $region)
              <option value="{{$region->id}}">{{$region->nombre}}</option>
              @endforeach
            </select>

          </div>
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Departamento </label>
          <div class="col-md-3 col-sm-9 col-xs-12">
            <select id="departamento" class=" form-control" name="ciudad">
            </select>

          </div>

          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Municipio</label>
            <div class="col-md-4 col-sm-9 col-xs-12">
              <select id="municipio" class=" form-control" name="municipio">

              </select>

            </div>
          </div>

          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Télefono/Celular</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <input name="telefono" value="{{old('telefono')}}" type="text" class="form-control" placeholder="">
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Alternativo</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <input name="telefono_alternativo" value="{{old('telefono_alternativo')}}" type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupación</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input name="ocupacion" value="{{old('ocupacion')}}" type="text" class="form-control " placeholder="">
          </div>
          </div>

          <div class="form-group">
          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Preferencias
          </label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input name="preferencias[]"   type="checkbox" value="Retiros/Eventos"> Retiros/Eventos
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
          <button style="width: 70% " type="submit" class="btn btn-success">CREAR</button>
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

      <div class="col-md-3 col-sm-3 col-xs-12">
        <select  id="region" class=" form-control" name="numero_registro">
          <option value="">Region...</option>
          @foreach($regiones as $region)
          <option value="{{$region->nombre}}">{{$region->nombre}}</option>
          @endforeach
        </select>

      </div>
      <div class="col-md-6 col-sm-9 col-xs-12">
      <input name="numero_planilla" value="{{old('numero_planilla')}}" type="text" class="form-control" placeholder="">
      </div>
      </div>

      </div>
      </div>
      </div>


      <!-- <div class="col-md-6 col-sm-12 col-xs-12">
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
      @if(isset($audio_url))
      <img class="img-onda" src="/img/onda.jpg" alt="">
      <input type="hidden"  name="voz" value="{{$audio_url->RecordingUrl}}">
      @else
      <input type="file" name="voz" value="">
      @endif
    </div>

      </div>
      </div> -->

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

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">

          <!-- Formulario tipo de titular -->
          @include('componentes.formulario_tipo_titular')
          <!-- Fin Formulario tipo de titular -->
        </div>
      </div>


      @can('crear.suscripcion')
      <!-- <button onclick="mostrarSuscripcion()" class="btn btn-default btn-suscripcion" type="button" name="button">CREAR SUSCRIPCIÓN</button> -->
      @endcan
      <!-- <button onclick="mostrarDonaciones()" class="btn btn-default btn-suscripcion" type="button" name="button">PROGRAMA DE DONACIONES</button> -->
      <!-- Ventana de suscripciones -->
      @include('layouts.suscripcion.suscripcion')
      <!-- Formulario para programa de donaciones -->
      <!-- @include('componentes.donaciones') -->


      </form>
    </div>

    </div>
  </div>
<!-- /page content -->
<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->

@section('scripts')
<!-- select2 -->
{!!Html::script('admin/js/select/select2.full.js')!!}
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
