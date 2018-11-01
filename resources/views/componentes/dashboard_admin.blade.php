<div class="row top_tiles">

@can('reporte.nacional')
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{url('bd_nacional')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-user"></i>
</div>
<div class="count">{{$count_personas}}</div>
<h3>Titular Nal.</h3>
<p>Titulares nacionales.</p>
</div>
</a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{'reporte_suscripcion'}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-book"></i>
</div>
<div class="count">{{$count_suscripcion}}</div>
<h3>Suscripciones Nal.</h3>
<p>Suscriptores nacionales.</p>
</div>
</a>
</div>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{url('reporte_donaciones')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-leaf"></i>
</div>
<div class="count">{{$count_donacion}}</div>
<h3>Donaciones Nal.</h3>
<p>Donaciones nacionales.</p>
</div>
</a>
</div>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{url('reportes')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-bar-chart"></i>
</div>
<div class="count">-</div>
<h3>Reportes</h3>
<p>Reportes.</p>
</div>
</a>
</div>
@endcan

@can('reporte.regional')
<!-- Reportes regionales -->
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{route('reporte.regional','Personas')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-user"></i>
</div>
<div class="count">Ixtus</div>
<h3>Titular Reg.</h3>
<p>Titulares regionales.</p>
</div>
</a>
</div>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{route('reporte.regional','Suscripciones')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-book"></i>
</div>
<div class="count">Ixtus</div>
<h3>Suscripciones Reg.</h3>
<p>Suscriptores Regionales.</p>
</div>
</a>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{route('reporte.regional','Donaciones')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-leaf"></i>
</div>
<div class="count">Ixtus</div>
<h3>Donaciones Reg.</h3>
<p>Donaciones Regionales.</p>
</div>
</a>
</div>
@endcan


@can('listar.titular')
<!-- Mis reportes -->
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{route('listar.titular','General')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-user"></i>
</div>
<div class="count">Ixtus</div>
<h3>Mis titulares</h3>
<p>Titulares personal.</p>
</div>
</a>
</div>
@endcan
@can('listar.suscripcion')
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{url('suscripciones')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-book"></i>
</div>
<div class="count">Ixtus</div>
<h3>Mis suscripciones</h3>
<p>Suscripciones personales.</p>
</div>
</a>
</div>
@endcan
@can('listar.donaciones')
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="{{route('listar.donaciones')}}">
<div class="tile-stats">
<div class="icon"><i class="fa fa-leaf"></i>
</div>
<div class="count">Ixtus</div>
<h3>Mis donaciones</h3>
<p>Donaciones personales.</p>
</div>
</a>
</div>
@endcan
@can('reporte.nacional')
@include('componentes.reporte-nacional')
@endcan






</div>
