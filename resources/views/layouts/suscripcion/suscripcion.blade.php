
<div id="panel-suscripcion" class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>El Man está Vivo - Suscripción </h2>
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
<div class="col-md-3">
<label class="">Oracional</label>
<select id="oracional" name="oracional"  class="form-contro select-oracional">
<option value="" >Seleccione</option>
<option value="Jóvenes" >Jóvenes</option>
<option value="Adultos" >Adultos</option>
<option value="Niños" >Niños</option>
<option value="Puerta a la palabra" >Puerta a la palabra</option>
</select>
</div>
<div class="col-md-3">
<label class="">Tipo</label> <br>
<select id="plan" name="plan"  class="form-contro select-oracional">
<option value="" >Seleccione</option>
<option value="6" >6 meses</option>
<option value="12" >1 año</option>

</select>
</div>
<div class="col-md-3">
<label class="">Fecha suscripcion</label> <br>
<input id="fecha_suscripcion" class="input-fecha" type="date" name="fecha_suscripcion" value="">
</div>

</div>
<hr>

<div class="row">
<div class="col-md-12">
<div id="lista-direcciones">
<table style="width:100%">
<thead>
<tr>
<th>Oracional</th>
<th>Tipo</th>
<th>Fecha</th>
<th>Borrar</th>
<th></th>
</tr>


</thead>
<tbody id="mostrar-direcciones">

<input type="hidden" id="ListaPro" name="lista_sus" value=""  />
</tbody>

</table>

</div>
</div>
</div>

<hr>
<div class="row">
<label>Direccion de envío</label><br>
<p>
<input type="radio" onclick="ocultarDireccion();"   name="direccion_radio"  value="misma"/>
Misma dirección inicial:

<input type="radio" name="direccion_radio" onclick="mostrarDireccion();"  value="otra" />
Otra dirección:
</p>

<div class="direccion" id="direccion" >
<div class="col-md-12">
Nombre de quien recibe <br>
<input class="nombre-recibe" type="text" id="nombre_recibe" name="nombre_recibe" value="" >
</div>

<div class=" direccion-suscripcion col-md-6">
Dirección <br>
<input class="nombre-recibe" type="text" id="direccion_suscripcion" name="direccion_suscripcion" value="" >
</div>

<div class="direccion-suscripcion col-md-6">
Especificaciones de dirección <br>
<input class="nombre-recibe" type="text" id="especificacion_direccion_suscripcion" name="especificacion_direccion_suscripcion" value="">
</div>
<div class="direccion-suscripcion col-md-6">
Ciudad <br>
<input class="nombre-recibe" type="text" id="ciudad_suscripcion" name="ciudad_suscripcion" value="">
</div>
<div class="direccion-suscripcion col-md-6">
País <br>
<input class="nombre-recibe" type="text" id="region_suscripcion" name="pais_suscripcion" value="">
</div>
<div class="direccion-suscripcion col-md-6">
Télefono <br>
<input class="nombre-recibe" type="text" id="telefono_suscripcion" name="telefono_suscripcion" value="">
</div>


<div class="direccion-suscripcion col-md-12">
Observaciones <br>
<textarea name="observacion_suscripcion" id="observacion_suscripcion"  class="form-control"  data-parsley-trigger="keyup" data-parsley-minlength="20"
data-parsley-maxlength="100" ></textarea>
</div>
<div class="direccion-suscripcion col-md-12">
<button type="button" class="btn btn-default" id="añadir-suscripcion" name="button">AÑADIR SUSCRIPCIÓN</button>
</div>
</div>
</div>
</div>
</div>
</div>
