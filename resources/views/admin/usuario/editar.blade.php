@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>CREAR USUARIOS</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>CREAR USUARIOS<small>Ixtus</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<br />
{{ Form::open(['route' => ['usuario.update',$usuario->id], 'method' => 'post']) }}
  {!!csrf_field()!!}

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="nombres" value="{{$usuario->name}}" placeholder="Nombres">
<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control" id="inputSuccess3" name="apellidos" value="{{$usuario->apellidos}}" placeholder="Apellidos">
<span class="fa fa-user form-control-feedback right"  aria-hidden="true"></span>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control has-feedback-left" name="email" id="inputSuccess4" value="{{$usuario->email}}" placeholder="Email">
<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control" id="inputSuccess5" name="telefono" value="{{$usuario->telefono}}" placeholder="Teléfono">
<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control has-feedback-left" name="cedula"  value="{{$usuario->cedula}}" placeholder="No. Identificacion">
<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

<input type="text" class="form-control has-feedback-left" name="cargo"  value="{{$usuario->cargo}}" placeholder="Cargo">
<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  @if(isset($usuario->region->nombre))
<input type="text" class="form-control has-feedback-left" name="regionales"  value="{{$usuario->region->nombre}}" placeholder="Region">
 @else
 <input type="text" class="form-control has-feedback-left" name="regionales"  value="" placeholder="Region">
 @endif
<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<button data-toggle="modal" data-target=".bs-example-modal-sm" type="button" class="btn btn-success" name="button">Cambiar Contraseña</button>
</div>


<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Regional</label>
<div class="col-md-9 col-sm-9 col-xs-12">
    <select name="region" class="form-control">
        <option  value="">Seleccione...</option>
        @foreach($regiones as $region)
        <option value="{{$region->id}}">{{$region->nombre}}</option>
        @endforeach

    </select>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo</label>
<div class="col-md-9 col-sm-9 col-xs-12">
    <select name="cargo" class="form-control">
        <option value="" >Seleccione...</option>
        @foreach($cargos as $cargo)
        <option value="{{$cargo->nombre}}">{{$cargo->nombre}}</option>
        @endforeach

    </select>
</div>
</div>

<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
  <hr>
  <h4>MIS ROLES</h4>
  @foreach($role as $r)
  <li>{{$r}}</li>
  @endforeach
  <hr>
</div>

<br>

<hr>
<h4>LISTA DE ROLES</h4>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($roles as $role)
    <li>
      <label>
        {{ Form::checkbox('roles[]',$role->id,null)}}
        {{$role->name}}
      </label>
    </li>
    @endforeach
  </ul>
</div>



<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-9 col-sm-9 col-xs-12">
  {{ Form::submit('ACTUALIZAR', ['class' =>'btn btn-primary' ])}}

</div>
</div>
{{ Form::close() }}

</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>USUARIOS <small></small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<table class="table table-bordered">
<thead>
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Email</th>
<th>Acción</th>
</tr>
</thead>
<tbody>
  @foreach($usuarios as $user)
<tr>
<th scope="row">{{$user->id}}</th>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>
  <a href="{{route('editar.usuario',$user->id)}}">
  <button type="button" style="width:80%;" class="btn btn-default" name="button">Editar</button>
  </a>
</td>

</tr>
@endforeach
</tbody>
</table>

</div>
</div>
</div>
</div>

  <!-- Small modal -->


  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
  <div class="modal-content">

  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
  <h4 class="modal-title" id="myModalLabel2">EDITAR CONTRASEÑA</h4>
  </div>
  <div class="modal-body">
  <h4>Nueva contraseña</h4>
<form class="" action="{{url('cambio_pass',$usuario->id)}}"  method="post">
  {!!csrf_field()!!}
  <div class="form-group">
    <label for=""></label>
    <input type="text" class="form-control" id="" name="pass" placeholder="">
    <p class="help-block">Ixtus service</p>
  </div>

  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
  <button type="submit" class="btn btn-primary">CAMBIAR</button>
  </div>

</form>
  </div>


  </div>
  </div>
  </div>

</div>
<!-- /page content -->


</div>


@endsection
