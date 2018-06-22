@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

<div class="">
<div class="page-title">
<div class="title_left">
<h3>SUSCRIPCIONES</h3>
</div>

</div>
<div class="clearfix"></div>

<div class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2> IXTUS</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a href="#"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="#"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>

<div class="x_content">
<div class="col-md-9 col-sm-9 col-xs-12">

<br />

<div id="mainb" style="height:350px;"></div>

</div>

<!-- start project-detail sidebar -->
<div class="col-md-3 col-sm-3 col-xs-12">

<section class="panel">

<div class="x_title">
<h2>Descripción de la suscripcion</h2>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<h3 class="green"><i class="fa fa-book"></i></h3>

<p></p>
<br />

<div class="project_detail">

<p class="title">Usuario</p>
<p></p>
<p class="title">Correo</p>
<p></p>
<p class="title">Telefono</p>
<p></p>
</div>
<br />
<h3>Datos de envío</h3>
<div class="project_detail">

<p class="title">dirección</p>
<p></p>
<p class="title">Especificacion de dirección</p>
<p></p>
</div>
<br/>
<div class="text-center mtop20">
<a href="#" class="btn btn-sm btn-primary">Editar</a>
<a href="#" class="btn btn-sm btn-danger">Eliminar</a>
</div>
</div>

</section>

</div>
<!-- end project-detail sidebar -->

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
