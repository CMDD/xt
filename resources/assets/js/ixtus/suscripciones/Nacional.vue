<template>
  <div class="">
  <!-- Main content -->
<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>SUSCRIPCIONES |<small>IXTUS</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a href="#"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="#"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">


<table id="datatable-suscripciones" class="table table-striped responsive-utilities jambo_table">
    <thead>
        <tr>
            <th>Estado</th>
            <th>T/Mes</th>
            <th>Fecha de pago</th>
            <th>Fecha de inicio</th>
            <th>Fecha de corte</th>
            <th>Recibe</th>
            <th>Titular</th>
            <th>Cedula</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
</div>
</div>
<br/>
<br/>
<br/>
</div>
</div>

</div>
  </div>
</template>

<script>
import datatable from 'datatables'

export default {
  mounted() {
      console.log('Component mounted.')
  },
  created(){
      console.log('componente nuevo');
      
    $(document).ready( function () {
        $('#datatable-suscripciones').DataTable({
          "serverSide":true,
          "ajax":"api/suscripciones/nacional",
          "columns":[
            {data:'estado'},
            {data:'plan'},
            {data:'fecha_inicio'},
            {data:'apartir_de'},
            {data:'fecha_final'},
            {data:'nombre_recibe'},
            {data:'titular'},
            {data:'cedula'},
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
  data(){
    return{
      sus:[]
    }
  },
  methods:{

  }

}



</script>
