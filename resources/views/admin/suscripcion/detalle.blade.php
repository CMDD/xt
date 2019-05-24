@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>DETALLE <small> Ixtus</small></h3>
</div>

</div>
<div class="clearfix"></div>

<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2> SUSCRIPCION |
  @can('editar.suscripcion')
  <a href="{{route('editar.suscripcion',$sus->id)}}">
    <button type="button" class="btn btn-danger " name="button">Editar</button>
  </a>
  @endcan
  <a href="{{url('suscripcion-historial',$sus->id)}}">
    <button type="button" class="btn btn-primary " name="button">Historial</button>
  </a>
  
</h2>
<a href="{{url('ixtus-suscripciones-nacionales')}}">
    <button type="button" class="btn btn-success  pull-right" name="button">Suscripciones Nacionales</button>
  </a>

<div class="clearfix"></div>
</div>

<div class="x_content">
<div class="col-md-7 col-sm-9 col-xs-12">
<ul class="stats-overview">
<li>
<span class="name"> Tiempo </span>
<span class="value text-success"> {{$sus->plan}} Meses </span>
</li>
<li class="hidden-phone">
<span class="name"> Estado </span>
<span class="value text-success"> {{$sus->estado}}</span>
</li>
<li class="hidden-phone">
<span class="name"> Fecha de vencimiento  </span>
<span class="value text-success"> {{$sus->envio_hasta->format('d/m/Y')}}</span>
</li>
</ul>
<br />

<div id="mainb" style="height:350px;">
  <div class="col-md-6 form-group">
    <label for="">Nombre de quien recibe</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->nombre_recibe}}" >
  </div>


  <div class="col-md-6 form-group">
    <label for="">Télefono</label>
    <input type="text" class="form-control" id="" disabled  value="{{$sus->telefono}}" >
  </div>


  <div class="col-md-12 form-group">
   <label for="">Dirección</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->direccion}}" placeholder="">
  </div>
  <!-- <div class="col-md-6 form-group">
   <label for="">Especificación de dirección</label>
   <input type="text" class="form-control" id="" disabled name="especificacion_direccion" value="{{$sus->direccion_especificacion}}" placeholder="">
  </div> -->
  <div class="col-md-6 form-group">
   <label for="">Region</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->municipio->departamento->region->nombre}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">departamento</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->municipio->departamento->nombre}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">municipio</label>
   <input type="text" class="form-control" id="" disabled  value="{{$sus->municipio->nombre}}" placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Numero de factura  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->numero_factura}}"  placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Fecha inicio:</label>
   @if($sus->apartir_de)
  <input type="date" class="form-control" id="" name="apartir_de" value="{{$sus->apartir_de->format('Y-m-d')}}"
    name="apartir_de">
  @else
   <input type="date" class="form-control" id="" name="apartir_de" value=""
  name="apartir_de">
  @endif
   
  </div>
  <div class="col-md-6 form-group">
    <label for="">Fecha vencimiento</label>
    <input disabled type="text" class="form-control" id=""  value="{{$sus->envio_hasta->format('d/m/Y')}}" name="numero_suscripcion" placeholder="Consecutivo del desprendible asignado">
  </div>


  <div class="col-md-6 form-group">
   <label for="">Fecha de pago  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->fecha_inicio->format('d/m/Y')}}"  placeholder="">
  </div>
  <div class="col-md-6 form-group">
   <label for="">Numero de suscripcion  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->numero_suscripcion}}"  placeholder="">
  </div>

  <div class="col-md-6 form-group">
   <label for="">Punto de venta  </label>
   <input type="text" class="form-control" id="" disabled value="{{$sus->punto_venta}}"  placeholder="">
  </div>
  <div class="col-md-9 form-group">
   <label for="">Observación</label>
   <textarea name="observacion" class="form-control" disabled rows="5" cols="80">{{$sus->observacion}}</textarea>
  </div>


</div>

</div>

<!-- start project-detail sidebar -->
<div class="col-md-5 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>ORACIONALES</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Jovenes</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="jovenes" value="{{$sus->jovenes}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Adultos</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="adultos" value="{{$sus->adultos}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Niños</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="ninos" value="{{$sus->ninos}}">
  </div>
  <div class="col-md-6 form-group">
    <label for=""><i class="fa fa-book"></i>Puerta a la palabra</label>
    <input type="number" disabled  min="0" class="form-control" id="" name="puerta" value="{{$sus->puerta}}">
  </div>
<hr>
<br />
<br/>

</div>

</section>

</div>
<div class="col-md-5 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>DETALLES DEL TITULAR</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
  <div class="project_detail">
  <p class="title">TITULAR</p>
  <p>{{$sus->persona->nombres}}</p>
  <p class="title">Correo</p>
  <p>{{$sus->persona->correo}}</p>
  <p class="title">Telefono</p>
  <p>{{$sus->persona->telefono}}</p>
  </div>
</div>

</section>

</div>
<div class="col-md-5 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>DETALLES DEL USUARIO</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
  <div class="project_detail">
  <p class="title">USUARIO</p>
  <p>{{$sus->usuario->name}}</p>
  <p class="title">Correo</p>
  <p>{{$sus->usuario->email}}</p>
  <p class="title">Telefono</p>
  <p>{{$sus->usuario->telefono}}</p>
  </div>
</div>

</section>

</div>
<!-- end project-detail sidebar -->
<div class="col-md-12">
<hr>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>HISTORIAL</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      @foreach($his as $hi)
      <ul class="list-unstyled timeline">

        <li>

          <div class="block">
            <div class="tags">
              <a href="" class="tag">
                <span>Nota</span>
              </a>
            </div>
            <div class="block_content">
              <h2 class="title">
                <a>{{$hi->asunto}}</a>
              </h2>
              <div class="byline">
                <span>{{$hi->created_at}}</span> Por <a>{{$hi->usuario['name']}}</a>
              </div>
              <p class="excerpt">{{$hi->mensaje}}
              </p>
              <p class="excerpt">{{$hi->numero_factura}}
              </p>
            </div>
          </div>
        </li>

      </ul>
      @endforeach
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
@endsection
