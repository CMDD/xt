@extends('layouts.admin')
@section('style')
<!-- select2 -->
{{ Html::style('css/celular.css')}}
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="page-title">
<div class="title_left">
<h3>
<div class="col-md-12">
  <a href="{{url('llamadas')}}">
<button type="button" class="btn btn-default" name="button">VER HOSTORIAL</button>
</a>
</div>

<small>

</small>
</h3>
</div>
<div class="title_right">
<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

  <div id="fountainG">
    @if(isset($call))
  	<div id="fountainG_1" class="fountainG"></div>
  	<div id="fountainG_2" class="fountainG"></div>
  	<div id="fountainG_3" class="fountainG"></div>
  	<div id="fountainG_4" class="fountainG"></div>
  	<div id="fountainG_5" class="fountainG"></div>
  	<div id="fountainG_6" class="fountainG"></div>
  	<div id="fountainG_7" class="fountainG"></div>
  	<div id="fountainG_8" class="fountainG"></div>
      @endif
  </div>


</div>
</div>

<div class="container">
<div class="row">
<div class="col-md-4  phone">
<div class="row1">
<div class="col-md-12">
  <form class="" action="{{url('call')}}" method="post">
    {!!csrf_field()!!}
  <input type="tel" required name="numero" id="telNumber" class="form-control tel" value="" />

<div class="num-pad">
<div class="span4">
<div class="num">
<div class="txt">
1
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
2 <span class="small">
<p>
ABC</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
3 <span class="small">
<p>
DEF</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
4 <span class="small">
<p>
GHI</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
5 <span class="small">
<p>
JKL</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
6 <span class="small">
<p>
MNO</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
7 <span class="small">
<p>
PQRS</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
8 <span class="small">
<p>
TUV</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
9 <span class="small">
<p>
WXYZ</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
*
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
0 <span class="small">
<p>
+</p>
</span>
</div>
</div>
</div>
<div class="span4">
<div class="num">
<div class="txt">
#
</div>
</div>
</div>
</div>
<div class="clearfix">
</div>
<input class="btn-phone btn btn-success" type="submit" name="" value="LLAMAR">
@if(isset($call))
 <a href="{{url('terminar',$call->sid)}}">
   <input class="btn-phone btn btn-danger" type="button" name="" value="TERMINAR">
 </a>
 @else
 <input class="btn-phone btn btn-danger" type="button" name="" value="TERMINAR">
 @endif

</form>
</div>
</div>
<div class="clearfix">
</div>
</div>

<div class="col-md-6">
  @if(isset($call))
  <div class="caja-negra">
    <div class=" contenido-llamada">
      <p class="title-llamada" >Software: Ixtus | Minuto de Dios</p>
      <p class="text-llamada" > Conectado...</p>
      <div class=" contenedor caja_detalle">
        <p class="text-llamada-white" > LLamando a : {{$call->to}}<span>&#160;</span> <br>
         Estado : Proceso <br>
         Inicio : {{$call->dateCreated->format('Y-m-d H:i:s')}} <br>
         Formato : .MP3 <br>
         ID Cuenta : {{$call->accountSid}}<br></p>
      </div>


    </div>
    @endif



  </div>

</div>
</div>
</div>

</div>
</div>
</div>
@section('scripts')
<script type="text/javascript">
$(document).ready(function () {

$('.num').click(function () {
var num = $(this);
var text = $.trim(num.find('.txt').clone().children().remove().end().text());
var telNumber = $('#telNumber');
$(telNumber).val(telNumber.val() + text);
});

});

</script>

@endsection
@endsection
