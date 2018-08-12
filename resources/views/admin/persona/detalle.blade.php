@extends('layouts.admin')
@section('style')
<!-- select2 -->
{{ Html::style('admin/css/select/select2.min.css')}}
@endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      <h3>DETALLES</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>
            CRM - MD |
        </h2>
        @can('editar.titular')
        <a href="{{url('editar',$persona->id)}}">
        <button style="margin-left:5%;" type="button" class="btn btn-default button-editar"
        data-toggle="tooltip" data-placement="left" >EDITAR
        </button>
        </a>
        @endcan
        <a href="{{url('historial',$persona->id)}}">
        <button style="margin-left:1%;" type="button" class="btn btn-default button-historial"
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
          <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="{{url('crear-persona')}}" method="post">
            {!!csrf_field()!!}
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->nombres}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->apellidos}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de persona</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            @foreach($tipo_personas as $tipo)
            <button type="button" class="btn btn-default tooltip-button" data-toggle="tooltip" data-placement="left" >{{$tipo->nombre}}</button>
            @endforeach
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->tipo_documento}}
          </button>
          </div>
          <div class="col-md-6 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->numero_documento}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de nacimiento</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->fecha_nacimiento}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->correo}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico (Alternativo)</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->correo_alternativo}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->direccion}}
            </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Especificación de Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->direccion_especificacion}}
            </button>
          </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Región</label>
            <div class="col-md-3 col-sm-9 col-xs-12">
              <button type="button" class="btn btn-default tooltip-button-datos"
              data-toggle="tooltip" data-placement="left" >{{$persona->municipio->departamento->region->nombre}}
            </button>

            </div>

            <label class="control-label col-md-2 col-sm-3 col-xs-12">Departamento </label>
            <div class="col-md-4 col-sm-9 col-xs-12">
              <button type="button" class="btn btn-default tooltip-button-datos"
              data-toggle="tooltip" data-placement="left" >{{$persona->municipio->departamento->nombre}}
            </button>

            </div>
            </div>




          <div class="form-group">


            <label class="control-label col-md-3 col-sm-3 col-xs-12">Municipio</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->municipio->nombre}}
          </button>

          </div>
          </div>


          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Télefono/Celular</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->telefono}}
          </button>
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Alternativo</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->telefono_alternativo}}
          </button>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupación</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->ocupacion}}
          </button>
          </div>
          </div>
          <div class="form-group">
          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Preferencias
          </label>
            @foreach($interes as $int)
            <button type="button" class="btn btn-default tooltip-button" data-toggle="tooltip" data-placement="left" >{{$int->nombre}}</button>
            @endforeach
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
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
            <button type="button" class="btn btn-default tooltip-button-datos"
            data-toggle="tooltip" data-placement="left" >{{$persona->numero_planilla}}
            </button>
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
          <div class="x_content">
            @if($persona->voz)
          <audio  id="pista" autostart="false"  src="/media/{{$persona->voz}}" > Su navegador no soporta la etiqueta audio.</audio>
          <a onclick="document.getElementById('pista').play()" class="btn btn-app">
              <i class="fa fa-play"></i> Play
          </a>
          <a onclick="document.getElementById('pista').pause()"  class="btn btn-app">
              <i class="fa fa-pause"></i> Pause
          </a>
          <a href="/media/{{$persona->voz}}" download="{{$persona->correo}}.ogg"   class="btn btn-app">
              <i class="fa fa-download"></i> Descargar
          </a>

          <img class="img-onda" src="/img/onda.jpg" alt="">
          @endif
          </div>
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
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
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
          </div>
          <hr>
          @foreach($suscripciones as $sus)
          <a href="{{url('suscripcion',$sus->id)}}"><button type="button" class="btn btn-default tooltip-button"
           data-toggle="tooltip" data-placement="left" >{{$sus->oracional}}
         </button></a>
          @endforeach
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
{{Html::script('admin/js/select/select2.full.js')}}
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
      allowClear: true
    });
  });
</script>
<!-- /select2 -->
@endsection
@endsection
