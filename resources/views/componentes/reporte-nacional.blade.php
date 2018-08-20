<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Reporte de Cantidades Nacional</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Settings 1</a>
</li>
<li><a href="#">Settings 2</a>
</li>
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="dashboard-widget-content">

<div class="col-md-3 hidden-small">
<h2 class="line_30">Titulares</h2>

<table class="countries_list">
<tbody>
<tr>
<td>Total</td>
<td class="fs15 fw700 text-right">{{$totales['total']}}</td>
</tr>
<tr>
<td>Comunidad</td>
<td class="fs15 fw700 text-right">{{$totales['total'] + ($totales['proveedor']-$totales['empleado'])}}</td>
</tr>

<tr>
<td>Activos</td>
<td class="fs15 fw700 text-right">{{$totales['titular_activo']}}</td>
</tr>
<tr>
<td>Desactivos</td>
<td class="fs15 fw700 text-right">{{$totales['titular_desactivo']}}</td>
</tr>
<tr>
<td>Provedor</td>
<td class="fs15 fw700 text-right">{{$totales['proveedor']}}</td>
</tr>
<tr>
<td>Empleado</td>
<td class="fs15 fw700 text-right">{{$totales['empleado']}}</td>
</tr>
<tr>
<td>Suscriptor</td>
<td class="fs15 fw700 text-right">{{$totales['suscriptor']}}</td>
</tr>

</tbody>
</table>
</div>
<div class="col-md-3 hidden-small">
<h2 class="line_30"></h2><br><br>

<table class="countries_list">
<tbody>
<tr>
<td>Oyente</td>
<td class="fs15 fw700 text-right">{{$totales['oyente']}}</td>
</tr>
<tr>
<td>Benefactor</td>
<td class="fs15 fw700 text-right">{{$totales['benefactor']}}</td>
</tr>

<tr>
<td>Cliente</td>
<td class="fs15 fw700 text-right">{{$totales['cliente']}}</td>
</tr>
<tr>
<td>Alumno</td>
<td class="fs15 fw700 text-right">{{$totales['alumno']}}</td>
</tr>
<tr>
<td>Asistente</td>
<td class="fs15 fw700 text-right">{{$totales['asistente']}}</td>
</tr>
<tr>
<td>Sevidor</td>
<td class="fs15 fw700 text-right">{{$totales['servidor']}}</td>
</tr>
</tbody>
</table>
</div>


<div class="col-md-3 hidden-small">
<h2 class="line_30">Suscripciones</h2>

<table class="countries_list">
<tbody>
<tr>
<td>Totales</td>
<td class="fs15 fw700 text-right">{{$totales['suscripciones']}}</td>
</tr>
<tr>
<td>Activas</td>
<td class="fs15 fw700 text-right">{{$totales['sus_activo']}}</td>
</tr>
<tr>
<td>Desactivas</td>
<td class="fs15 fw700 text-right">{{$totales['sus_desactivo']}}</td>
</tr>
<tr>
<td>Suspendidas</td>
<td class="fs15 fw700 text-right">0</td>
</tr>

</tbody>
</table>
</div>
<div class="col-md-3 hidden-small">
<h2 class="line_30">Donaciones</h2>

<table class="countries_list">
<tbody>
<tr>
<td>Total</td>
<td class="fs15 fw700 text-right">{{$totales['donaciones']}}</td>
</tr>
<tr>
<td>Activos</td>
<td class="fs15 fw700 text-right">{{$totales['don_activo']}}</td>
</tr>
<tr>
<td>Desactivos</td>
<td class="fs15 fw700 text-right">{{$totales['don_desactivo']}}</td>
</tr>


</tbody>
</table>
</div>






</div>
</div>
</div>
</div>
