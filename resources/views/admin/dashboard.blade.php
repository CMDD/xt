@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
<!-- top tiles -->
<div class="row tile_count">
<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
<div class="left"></div>
<div class="right">
<span class="count_top"><i class="fa fa-user"></i> Total Usuarios</span>
<div class="count">{{number_format($count_personas)}}</div>
<span class="count_bottom"><i class="green">4% </i> Esta semana</span>
</div>
</div>
<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
<div class="left"></div>
<div class="right">
<span class="count_top"><i class="fa fa-user"></i> Benefactor</span>
<div class="count">{{number_format($count_benefactor)}}</div>
<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> Esta semana</span>
</div>
</div>
<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
<div class="left"></div>
<div class="right">
<span class="count_top"><i class="fa fa-user"></i> Empleados</span>
<div class="count green">{{number_format($count_empleados)}}</div>
<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta semana</span>
</div>
</div>
<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
<div class="left"></div>
<div class="right">
<span class="count_top"><i class="fa fa-user"></i> Servidores</span>
<div class="count">{{number_format($count_servidores)}}</div>
<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Esta semana</span>
</div>
</div>
<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
<div class="left"></div>
<div class="right">
<span class="count_top"><i class="fa fa-user"></i> Clientes</span>
<div class="count">{{number_format($count_clientes)}}</div>
<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta semana</span>
</div>
</div>
<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
<div class="left"></div>
<div class="right">
<span class="count_top"><i class="fa fa-user"></i> Proveedores</span>
<div class="count">{{number_format($count_proveedores)}}</div>
<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Esta semana</span>
</div>
</div>
</div>
<!-- /top tiles -->
<br/>


<!-- Modulo de reporte -->
<div class="row top_tiles">

  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <a href="#">
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
  <a href="#">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">179</div>

        <h3>BD Regional</h3>
        <p>Base de datos regional.</p>
    </div>
    </a>
</div>



<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <a href="#">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-book"></i>
        </div>
        <div class="count">179</div>

        <h3>Suscripciones</h3>
        <p>Suscriptores nacionales.</p>
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
