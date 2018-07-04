@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3>ADMINISTRAR ROLES</h3>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>CREAR ROLES<small>Ixtus</small></h2>
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
<form class="form-horizontal form-label-left input_mask" action="{{route('roles.update',$role->id)}}" method="post">
  {!!csrf_field()!!}

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="nombre" value="{{$role->name}}" placeholder="Nombre">
<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
<input type="text" class="form-control" id="inputSuccess3" name="slug" value="{{$role->slug}}"  placeholder="slug">
<span class="fa fa-user form-control-feedback right"  aria-hidden="true"></span>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 form-group">
  <label for="message">Descripción :</label>
<textarea  class="form-control"  name="description" data-parsley-trigger="keyup" data-parsley-validation-threshold="10">{{$role->description}} </textarea>


</div>
<hr>
<hr>
<div class="row">
  <div class="col-md-6 form-group">
      <h4>LISTA DE PERMISOS</h4>
    @foreach($permissions as $permission)
    <div class="checkbox">
    <label>
      {{Form::checkbox('permissions[]',$permission->id,null)}}
      {{$permission->name}}
    </label>
    </div>
    @endforeach
  </div>
  <div class="col-md-6 form-group">
      <h4>LISTA DE PERMISOS</h4>
    @foreach($mispermisos as $mp)
    <div class="checkbox">
    <label>
      {{$mp}}
    </label>
    </div>
    @endforeach
  </div>

</div>



<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-9 col-sm-9 col-xs-12">
<button type="submit" class="btn btn-primary">ACTUALIZAR</button>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>ROLES <small></small></h2>
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
<th>Acción</th>
</tr>
</thead>
<tbody>

@foreach($roles as $role)
<tr>
<th scope="row">{{$role->id}}</th>
<td>{{$role->name}}</td>

<td style="width:40%;" >
  <a href="">
  <button type="button"  class="btn btn-sm btn-default" name="button">Ver</button>
  </a>
  <a href="{{route('roles.edit',$role->id)}}">
  <button type="button" class="btn btn-sm btn-default" name="button">Editar</button>
  </a>
  <button type="button"  class="btn btn-sm btn-danger" name="button">Eliminar</button>


</td>

</tr>
@endforeach
</tbody>
</table>

</div>
</div>
</div>
</div>

</div>
<!-- /page content -->


</div>


@endsection
