@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
<br/>
<!-- Modulo de reporte -->
<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['total']}}</div>
        <h3>Tolal Nacional</h3>
        <p>Base de datos nacional.</p>
    </div>

</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-bar-chart"></i>
        </div>
        <div class="count">{{$totales['proveedor']}}</div>
        <h3>Total proveedores</h3>
        <p>Reporte nacional.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-book"></i>
        </div>
        <div class="count">{{$totales['oyente']}}</div>
        <h3>Total oyentes</h3>
        <p>Reporte nacional.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['cliente']}}</div>
        <h3>Total clientes</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['alumno']}}</div>
        <h3>Total alumnos</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['asistente']}}</div>
        <h3>Total asistentes</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['servidor']}}</div>
        <h3>Total servidores</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['suscriptor']}}</div>
        <h3>Total suscriptores</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['benefactor']}}</div>
        <h3>Total benefactores</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-user"></i>
        </div>
        <div class="count">{{$totales['empleado']}}</div>
        <h3>Total empleados</h3>
        <p>Reporte nacionales.</p>
    </div>
</div>
</div>

<!-- Fin modulo reporte -->
<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->
</div>
@endsection
