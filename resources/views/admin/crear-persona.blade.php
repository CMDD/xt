@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      <h3>Nuevo Registro</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>CRM - MD | Datos básicos <small></small></h2>
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
          <br />
          <form class="form-horizontal form-label-left">
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control " placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de persona</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control">
          <option>Benefactor</option>
          <option>Empleado</option>
          <option>Servidores</option>
          <option>Cliente</option>
          <option>Proveedor</option>
          </select>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <select class="form-control">
          <option>CC</option>
          <option>TI</option>
          </select>
          </div>
          <div class="col-md-6 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="Número">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de nacimiento</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="D-M-A">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12">Correo electronico (Alternativo)</label>
          <div class="col-md-8 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Especificación de Dirección</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Paìs</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Télefono/Celular</label>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Alternativo</label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupación</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control " placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Preferencias
          </label>
          <div class="col-md-3 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input type="checkbox" value=""> Retiros/Eventos
          </label>
          </div>
          <div class="checkbox">
          <label>
          <input type="checkbox" value=""> Radio
          </label>
          </div>
          </div>
          <div class="col-md-4 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input type="checkbox" value=""> Tienda/Libreria
          </label>
          </div>
          <div class="checkbox">
          <label>
          <input type="checkbox" value=""> Novedades/Ofertas
          </label>
          </div>
          </div>
          <div class="col-md-2 col-sm-9 col-xs-12">
          <div class="checkbox">
          <label>
          <input type="checkbox" value=""> Apps
          </label>
          </div>
          <div class="checkbox">
          <label>
          <input type="checkbox" value=""> General
          </label>
          </div>
          </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <button style="width: 100% " type="submit" class="btn btn-success">Crear</button>
          </div>
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
      <h2>Autorizaciones</h2>
      <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
      </ul>
      <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <br/>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Planilla</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text" class="form-control" placeholder="">
      </div>
      </div>
      <div style="margin-top:8%;" class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Registro</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text" class="form-control" placeholder="">
      </div>
      </div>
      </div>
      </div>
      </div>


      <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
      <h2>Archivos de Voz</h2>
      <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
      </ul>
      <div class="clearfix"></div>
      </div>
      <input type="file" name="" value="">
      </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          <h2>Imagen</h2>
          <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
          </ul>
          <div class="clearfix"></div>
          </div>
          <input type="file" name="" value="">
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- /page content -->
  <!-- footer content -->
  @include('layouts.footer')
  <!-- /footer content -->
</div>
@endsection
