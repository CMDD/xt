@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>HISTORIAL</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6">
<div class="x_panel">
<div class="x_title">
<h2>DETALLES <small></small></h2>
<a href="{{url('detalle',$persona->id)}}">
<button style="margin-left:5%;" type="button" class="btn btn-default button-editar"
data-toggle="tooltip" data-placement="left" >DETALLE
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
<section class="content invoice">
<!-- title row -->
<div class="row">
<div class="col-xs-12 invoice-header">
<h1>
<i class="fa fa-user"></i> {{$persona->nombres}}
<p class="historial-apellidos">{{$persona->apellidos}}</p>
</h1>
</div>
</div>
<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
<b>Correo</b>
<address>
{{$persona->correo}}
<br><b>Télefono</b>
<br>{{$persona->telefono}}
<br><b>No.Documento</b>
<br>{{$persona->numero_documento}}
</address>
</div>
<div class="col-sm-4 invoice-col">
</div>
<div class="col-sm-4 invoice-col">
<b>Creado por:</b><br>
   Javier Cera <br>
<b>Registro Número:</b> <br>
   #{{$persona->id}}<br>
<b>Fecha de Creacion</b> <br>
   {{$persona->created_at}}
<br>
</div>
</div>
</section>
<hr>
</div>
<h2>CREAR NOTA</h2>
<br>
<form class="" action="{{url('crar_nota',$persona->id)}}" method="post">
{!!csrf_field()!!}

<label for="heard">Asunto:</label>
<input type="text" name="asunto" class="form-control">
<br>
<label for="message">Mensaje:</label>
<textarea id="message" required="required"
 class="form-control" name="mensaje" rows="4">
 </textarea>
<br/>
<input type="submit" class="btn btn-primary" name="" value="CREAR">
</form>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>HISTORIAL DE NOTAS</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
  @foreach($notas as $nota)
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
<a>{{$nota->asunto}}</a>
</h2>
<div class="byline">
<span>Hace 13 min</span> Por <a>Javier Cerra</a>
</div>
<p class="excerpt">{{$nota->mensaje}}
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
<!-- /page content -->
<!-- footer content -->
@include('layouts.footer')
<!-- /footer content -->
</div>
@endsection
