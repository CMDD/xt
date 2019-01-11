@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>HISTORIAL SUSCRIPCIÓN</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6">
<div class="x_panel">
<div class="x_title">
<a href="{{url('suscripcion',$sus->id)}}">
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

<hr>
</div>
<h2>CREAR HISTORIAL</h2>
<br>
  <form class="" action="{{url('historial-suscripcion',$sus->id)}}" method="post">
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
