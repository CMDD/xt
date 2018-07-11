@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
<br/>
<!-- Modulo de reporte -->
<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <a href="{{url('bd_nacional')}}">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$count_personas}}</div>
        <h3>BD Nacional</h3>
        <p>Base de datos nacional.</p>
    </div>
    </a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <a href="{{url('reportes')}}">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-bar-chart"></i>
        </div>
        <div class="count">0</div>
        <h3>Reportes</h3>
        <p>Donaciones nacionales.</p>
    </div>
    </a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <a href="{{'reporte_suscripcion'}}">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-book"></i>
        </div>
        <div class="count">{{$count_suscripcion}}</div>
        <h3>Suscripciones</h3>
        <p>Suscriptores nacionales.</p>
    </div>
    </a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <a href="{{url('reporte_donaciones')}}">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-book"></i>
        </div>
        <div class="count">{{$count_donacion}}</div>
        <h3>Donaciones</h3>
        <p>Donaciones nacionales.</p>
    </div>
    </a>
</div>
</div>
<!-- Fin modulo reporte -->
<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->
</div>
@endsection
