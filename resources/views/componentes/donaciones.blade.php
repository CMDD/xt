

<div id="donaciones"   class="col-md-6 col-sm-12 col-xs-12 ocultar ">
  <div class="x_panel">
    <div class="x_title">
    <h2> Donaciones </h2>
    <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
    </ul>
    <div class="clearfix"></div>
    </div>

  <div class="row">
    <div class="col-md-12">
      <div id="lista-direcciones">
        <table style="width:100%">
            <thead>
              <tr>
                <th>Benefactor</th>
                <th>Cantidad</th>
                <th>Cantidad</th>
                <th>Borrar</th>
                <th></th>
              </tr>


            </thead>
            <tbody id="mostrar-donacion">
              <input type="hidden" id="listaDonaciones" name="lista_donaciones" value=""  />
            </tbody>

        </table>

      </div>
    </div>
  </div>

    <hr>
    <div class="row">
    <label>Detalles</label><br>
        <div  id="direccion" >
          <div class="col-md-12">
            Nombre del Benefactor <br>
            <input class="nombre-recibe"  type="text" id="nombre_benefactor" name="nombre_benefactor" value="" >
          </div>

          <div class=" direccion-suscripcion col-md-6">
            Valor donado <br>
            <input class="nombre-recibe" type="text" id="valor_donado" name="valor_donado" value="" >
          </div>

          <div class="direccion-suscripcion col-md-6">
              Télefono <br>
            <input class="nombre-recibe" type="text" id="telefono_donacion" name="telefono_donacion" value="">
          </div>
          <div class="direccion-suscripcion col-md-6">
            Ciudad <br>
            <input class="nombre-recibe" type="text" id="ciudad_donacion" name="ciudad_donacion" value="">
          </div>
          <div class="direccion-suscripcion col-md-6">
            País <br>
            <input class="nombre-recibe" type="text" id="pais_donacion" name="pais_donacion" value="">
          </div>

          <div class="col-md-12">
            <label class="">Periodicidad</label>
            <select name="periodicidad" id="periodicidad"  class="form-contro select-oracional">
              <option value="" >Seleccione</option>
              <option value="15" >15 días</option>
              <option value="30" >30 días</option>
            </select>
          </div>
          <div class="col-md-12">
            <label class="">Nombre del programa</label>
            <select name="programa" id="programa"  class="form-contro select-oracional">
              <option value="" >Seleccione</option>
              <option value="Club de amigos" >Club de amigos</option>
              <option value="Minuto de evangelizacion" >Minutos de evangelización</option>
            </select>
          </div>

          <div class="direccion-suscripcion col-md-12">
            Observaciones <br>
            <textarea name="observacion_donacion" id="observacion_donacion"  class="form-control"  data-parsley-trigger="keyup" data-parsley-minlength="20"
             data-parsley-maxlength="100" ></textarea>
          </div>
          <div class="direccion-suscripcion col-md-12">
            <button type="button" class="btn btn-default" id="añadir-donacion" name="button">CREAR PROGRAMA</button>
          </div>
        </div>


 </div>
  </div>
</div>
