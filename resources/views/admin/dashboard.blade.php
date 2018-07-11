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
        <div class="count">179</div>
        <h3>BD Nacional</h3>
        <p>Base de datos nacional.</p>
    </div>
    </a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <a href="{{url('bd_regional')}}">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-book"></i>
        </div>
        <div class="count">179</div>
        <h3>Suscripciones</h3>
        <p>Suscriptores nacionales.</p>
    </div>
    </a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <a href="#">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-book"></i>
        </div>
        <div class="count">179</div>
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
