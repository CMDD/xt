<template>
  <section class="content container-fluid">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Artículos</h3> <br>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable-titulares" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ESTADO</th>
                  <th>NOMBRES</th>
                  <th>APELLIDOS</th>
                  <th># DOCUMENTO</th>
                  <th>TELÉFONO</th>
                  <th>ULTIMO CONTACTO</th>
                  <th>ACCION</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
</template>

<script>
export default {
  props:['region'],
  created(){
    let id = parseInt(this.region);
    $(document).ready( function () {
        $('#datatable-titulares').DataTable({
          "serverSide":true,
          "ajax":'/api/ixtus-titular-region/' + id,
          "columns":[
            {data:'estado'},
            {data:'nombres'},
            {data:'apellidos'},
            {data:'numero_documento'},
            {data:'telefono'},
            {data:'updated_at'},
            {data:'btn'},
          ],
          "language":{
          	"sProcessing":     "Procesando...",
          	"sLengthMenu":     "Mostrar _MENU_ registros",
          	"sZeroRecords":    "No se encontraron resultados",
          	"sEmptyTable":     "Ningún dato disponible en esta tabla",
          	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          	"sInfoPostFix":    "",
          	"sSearch":         "Buscar:",
          	"sUrl":            "",
          	"sInfoThousands":  ",",
          	"sLoadingRecords": "Cargando...",
          	"oPaginate": {
          		"sFirst":    "Primero",
          		"sLast":     "Último",
          		"sNext":     "Siguiente",
          		"sPrevious": "Anterior"
          	},
          	"oAria": {
          		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
          	}
          }
        });
    } );

  },
}
</script>

<style lang="css">
</style>
