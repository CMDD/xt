@extends('layouts.admin')

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
<h3>EDITAR TITULAR</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
  <!-- Formulario principal -->
<div class="col-md-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>IXTUS - MD | </h2>
<a href="{{url('historial',$persona->id)}}">
<button style="margin-left:5%;" type="button" class="btn btn-default button-historial"
data-toggle="tooltip" data-placement="left" >HISTORIAL
</button>
</a>
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
<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="{{url('actualizar_persona',$persona->id)}}" method="post">
{!!csrf_field()!!}
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input type="text" value="{{$persona->nombres}}" name="nombres" class="form-control" placeholder="">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input type="text" value="{{$persona->apellidos}}" name="apellidos" class="form-control " placeholder="">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento</label>
<div class="col-md-3 col-sm-9 col-xs-12">
<select name="tipo_documento" class="form-control">
<option value="{{$persona->tipo_documento}}">{{$persona->tipo_documento}}</option>
<option value="CC" >CC</option>
<option value="CE" >CE</option>
<option value="TI">TI</option>
</select>
</div>
<div class="col-md-6 col-sm-9 col-xs-12">
<input value="{{$persona->numero_documento}}" name="numero_documento" type="text" class="form-control" placeholder="Número">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de nacimiento</label>
<div class="col-md-8 col-sm-9 col-xs-12">
<input name="fecha_nacimiento" value="{{$persona->fecha_nacimiento}}" type="date" class="form-control" placeholder="DD-MM-AA">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico</label>
<div class="col-md-8 col-sm-9 col-xs-12">
<input value="{{$persona->correo}}" name="correo" type="text" class="form-control" placeholder="">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico (Alternativo)</label>
<div class="col-md-8 col-sm-9 col-xs-12">
<input value="{{$persona->correo_alternativo}}" name="correo_alternativo" type="text" class="form-control" placeholder="">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input value="{{$persona->direccion}}" name="direccion" type="text" class="form-control" placeholder="">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Especificación de Dirección</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input  value="{{$persona->direccion_especificacion}}" name="direccion_especificacion" type="text" class="form-control" placeholder="">
</div>
</div>

<div class="form-group">

<label class="control-label col-md-3 col-sm-3 col-xs-12">Región</label>
<div class="col-md-3 col-sm-9 col-xs-12">
  <select id="region" class=" form-control" name="region">
    @if(isset($persona->region_id))
    <option value="{{$persona->region->id}}">{{$persona->region->nombre}}</option>
    @else
       <option value="">Seleccione...</option>
    @endif
    @foreach($regiones as $region)
    <option value="{{$region->id}}">{{$region->nombre}}</option>
    @endforeach
  </select>
</div>
<label class="control-label col-md-3 col-sm-3 col-xs-12">Departamento </label>
<div class="col-md-3 col-sm-9 col-xs-12">
  <select id="departamento" class=" form-control" name="ciudad">
    @if(isset($persona->municipio))
    <option value="{{$persona->municipio->departamento->id}}">{{$persona->municipio->departamento->nombre}}</option>
    @endif
    <option value=""></option>
  </select>
</div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Municipio</label>
  <div class="col-md-4 col-sm-9 col-xs-12">
    <select id="municipio" class=" form-control" name="municipio">
      @if(isset($persona->municipio))
      <option value="">{{$persona->municipio->nombre}}</option>
      @endif
    </select>
  </div>
</div>

<div class=" row form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Télefono/Celular</label>
  <div class="col-md-4 col-sm-9 col-xs-12">
  <input  value="{{$persona->telefono}}" name="telefono" type="text" class="form-control" placeholder="">
  </div>
  <label class="control-label col-md-2 col-sm-3 col-xs-12">Alternativo</label>
  <div class="col-md-3 col-sm-9 col-xs-12">
  <input  value="{{$persona->telefono_alternativo}}" name="telefono_alternativo" type="text" class="form-control" placeholder="">
  </div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupación</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input  value="{{$persona->ocupacion}}" name="ocupacion" type="text" class="form-control " placeholder="">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">El  titular es:</label>
<div class="col-md-9 col-sm-9 col-xs-12">
@foreach($tipo_personas as $tipo)
<button type="button" class="btn btn-default ">
{{$tipo->nombre}}
<a href="{{url('eliminar_tipo',$tipo->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')">
  <i class="fa fa-close"></i>
</a>
</button>
@endforeach
</div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Agregar Tipo</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <select class="select2_multiple form-control" name="tipo_persona[]" multiple="multiple">
            <option value="Oyente" >Oyente</option>
            <option value="Cliente" >Cliente</option>
            <option value="Alumno">Alumno</option>
            <option value="Asistente">Asistente</option>
            <option value="Servidor">Servidor</option>
            <option value="Proveedor">Proveedor</option>
            <option value="Suscriptor">Suscriptor</option>
            <option value="Benefactor">Benefactor</option>
            <option value="Empleado">Empleado</option>
            <option value="Distribuidor">Distribuidor</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Grupo de Whatsapp</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <select class=" form-control" name="whatsapp" >
            <option value="" >Seleccione...</option>
            <option value="Bogota" >Bogotá</option>
            <option value="Medellin" >Medellín</option>
            <option value="Barranquilla">Barranquilla</option>
            <option value="Cartagena">Cartagena</option>

        </select>
    </div>
</div>

<!-- formulario tipo titular -->
<!-- <div class="form-group">
<label class="col-md-3 col-sm-3 col-xs-12 control-label">Preferencias
</label>
@foreach($interes as $int)
<button type="button" class="btn btn-default"
data-toggle="tooltip" data-placement="left" >{{$int->nombre}}
<a href="{{url('eliminar_interes',$int->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" ><i class="fa fa-close"></i></a>
</button>
@endforeach
<hr>
<h4>Preferencias</h4>
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
</div> -->
<!-- Formulario tipo de titular -->
<!-- @include('componentes.formulario_tipo_titular') -->
<!-- Fin Formulario tipo de titular -->
<!-- fin tipo titular -->


<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
<button style="width: 100% " type="submit" class="btn btn-success">ACTUALIZAR</button>
</div>
</div>

</div>
</div>
</div>
<!-- Fin formulario principal -->
<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>AUTORIZACIONES</h2>
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
  <select id="region" class=" form-control" name="numero_registro">
    <option value="{{$persona->numero_registro}}">{{$persona->numero_registro}}</option>
    @foreach($regiones as $region)
    <option value="{{$region->nombre}}">{{$region->nombre}}</option>
    @endforeach
  </select>

</div>
<div class="col-md-6 col-sm-9 col-xs-12">
<input name="numero_planilla" type="text" value="{{$persona->numero_planilla}}" class="form-control" placeholder="">
</div>
</div>

</div>
</div>
</div>

<!-- <div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>ARCHIVOS DE VOZ</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
@if($persona->voz)
<audio  id="pista" autostart="false"  src="/media/{{$persona->voz}}" > Su navegador no soporta la etiqueta audio.</audio>
<a onclick="document.getElementById('pista').play()" class="btn btn-app">
<i class="fa fa-play"></i> Play
</a>
<a onclick="document.getElementById('pista').pause()"  class="btn btn-app">
<i class="fa fa-pause"></i> Pause
</a>
<a href="/media/{{$persona->voz}}" download="audio"   class="btn btn-app">
<i class="fa fa-download"></i> Descargar
</a>

<img class="img-onda" src="/img/onda.jpg" alt="">
@endif
</div>
<input class="file-voz" type="file" name="voz" value="">
</div>
</div> -->

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>IMAGEN</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
  @if($persona->imagen)
<div class="caja-imagen">
<img class="imagen-persona" src="/media/{{$persona->imagen}}" alt="Planilla">
<a href="/media/{{$persona->imagen}}" download="imagen"   class="btn btn-app">
<i class="fa fa-download"></i> Descargar
</a>
</div>
@endif
</div>
<input type="file" name="imagen" >
</div>
</div>

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>ESTADO</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<select name="estado" class="form-control">
<option value="{{$persona->estado}}">{{$persona->estado}}</option>
<option value="Desactivo" >Desactivar</option>
<option value="Activo" >Activar</option>
</select>
</div>
</div>
</div>

<!-- <div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>El Man está Vivo - Suscripciónes </h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
<div class="x_content">
<hr>
@foreach($suscripciones as $sus)
<a href="{{url('suscripcion',$sus->id)}}"><button type="button" class="btn btn-default tooltip-button"
data-toggle="tooltip" data-placement="left" >{{$sus->oracional}}
</button></a>
@endforeach
</div>
</div>
</div>


</div> -->



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
{{Html::script('admin/js/select/select2.full.js')}}
<!-- select2 -->
<script>
  $(document).ready(function () {
  $(".select2_single").select2({
      allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
      placeholder: "¡Click para seleccionar tipo de titular!",
      requerid:true,
      allowClear: true
    });
  });
</script>
<!-- /select2 -->
@endsection
@endsection

@push('styles')
{{Html::style('admin/css/select/select2.min.css')}}

@endpush
