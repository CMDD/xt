<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
<h2>TITULARES</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<div class="row">

  <form class="" action="{{url('reporteTitulares')}}" method="post">

{!!csrf_field()!!}

  <div class="col-md-2">
    <div class="form-group">
      <label for="">Tipo de reporte</label>
      <select required class="form-control" name="tipo">
        <option value="">Seleccione...</option>
        <option value="cantidades">Cantidades</option>
        <option value="listado">Listado</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Region</label>
      <select required class="form-control" name="region">
        <option value="">Seleccione...</option>
        <option value="Todas">Todas</option>
        @foreach($regiones as $region)
        <option value="{{$region->nombre}}">{{$region->nombre}}</option>
        @endforeach

      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Estado</label>
      <select required class="form-control" name="estado">
        <option value="">Seleccione...</option>
        <option value="Activo">Activos</option>
        <option value="Desactivo">Desactivos</option>
      </select>
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="">Desde</label>
      <input required class="form-control" type="date" name="desde" value="">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Hasta</label>
      <input required class="form-control" type="date" name="hasta" value="">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="">Accion</label>
      <input  class="form-control btn btn-primary" type="submit" name="" value="Buscar">
    </div>
  </div>
</form>
</div>


</div>
</div>
</div>
