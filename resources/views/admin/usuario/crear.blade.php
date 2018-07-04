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
  <form class="form-horizontal form-label-left input_mask" action="{{route('usuario.create')}}" method="post">
    {!!csrf_field()!!}

  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="nombres" placeholder="Nombres">
  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" class="form-control" id="inputSuccess3" name="apellidos" placeholder="Apellidos">
  <span class="fa fa-user form-control-feedback right"  aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" name="email" id="inputSuccess4" placeholder="Email">
  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" class="form-control" id="inputSuccess5" name="telefono" placeholder="Teléfono">
  <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" name="cedula" id="inputSuccess4" placeholder="No. Identificacion">
  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  <input type="text" class="form-control" id="inputSuccess5" name="pass" placeholder="Contraseña">
  <span class="fa fa-gear form-control-feedback right" aria-hidden="true"></span>
  </div>


<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Regional</label>
  <div class="col-md-9 col-sm-9 col-xs-12">
      <select name="regional" class="form-control">
          <option  value="">Seleccione...</option>
          @foreach($regiones as $region)
          <option value="{{$region->nombre}}">{{$region->nombre}}</option>
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


<hr>
<div class="form-group">
    <h4>ROLES</h4>
  @foreach($roles as $role)
  <div class="checkbox">
  <label>
    {{Form::checkbox('roles[]',$role->id,null)}}
    {{$role->name}}
  </label>
  </div>
  @endforeach
</div>



  <div class="ln_solid"></div>
  <div class="form-group">
  <div class="col-md-9 col-sm-9 col-xs-12">
  <button type="submit" class="btn btn-primary">CREAR</button>
  </div>
  </div>
  </form>
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
  <th>Rol</th>
  <th>Email</th>
  <th>Acción</th>
  </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $user)
  <tr>
  <th scope="row">{{$user->id}}</th>
  <td>{{$user->name}}</td>
  <td>Lider nacional</td>
  <td>{{$user->email}}</td>
  <td>
    <a href="{{route('usuario.edit',$user->id)}}">
    <button type="button" style="width:100%;" class="btn btn-default" name="button">Editar</button>
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

  </div>
  <!-- /page content -->


  </div>


  @endsection
