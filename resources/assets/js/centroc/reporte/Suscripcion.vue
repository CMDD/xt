<template>
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte Suscripciones
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Reporte</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Adultos</span>
              <span class="info-box-number">{{adultos}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jovenes</span>
              <span class="info-box-number">{{jovenes}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Niños</span>
              <span class="info-box-number">{{ninos}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Puerta a la Palabra</span>
              <span class="info-box-number">{{puerta}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow "><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Descarga Completa</span>
              <span class="info-box-number">
                <a href="/api/suscripciones-completas/Activo">
                  <button class="btn btn-success btn-sm">Activas</button>
                  
                </a>
                <a href="/api/suscripciones-completas/Desactivo">
                  <button class="btn btn-success btn-sm">Desactivo</button>
                  
                </a>
                
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Descarga  Servientrega</span>
              <span class="info-box-number">
                <a href="/api/suscripciones-servientrega">
                <button class="btn btn-info">Descargar</button>
                </a>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">

        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total</span>
              <span class="info-box-number">{{total}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Activas</span>
              <span class="info-box-number">{{activas}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
             
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Desactivas</span>
              <span class="info-box-number">{{desactivas}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      
          <!-- /.box -->
        </div>

       
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
    
</template>


<script>
import datatable from 'datatables'
export default {

  data(){
    return{
      activas:'',
      desactivas:'',
      total:'',
      adultos:0,
      ninos:0,
      jovenes:0,
      puerta:0
    }
  },
  created(){
      this.suscripcionesTotal();
      this.suscripcionesDesactivas();
      this.suscripcionesActivas();
      this.cantidadSuscripciones();
      this.dataTable();
      
  },
  methods:{
      cantidadSuscripciones(){
        axios.get('/api/cantidad-suscripciones').then(res=>{
          res.data.forEach(sus => {
              this.adultos += sus['adultos'];
              this.ninos += sus['ninos'];
              this.jovenes += sus['jovenes'];
              this.puerta += sus['puerta'];
           });  
            console.log(this.adultos);
            
        });

      },
      suscripcionesTotal(){
        axios.get('/api/reporte/suscripciones/total').then(res=>{
           this.total = res.data;
        });
      },
      suscripcionesActivas(){
        axios.get('/api/reporte/suscripciones/activas').then(res=>{
           this.activas = res.data;
        });
      },
      suscripcionesDesactivas(){
        axios.get('/api/reporte/suscripciones/desactivas').then(res=>{
           this.desactivas = res.data;
           
        });
      },

      dataTable(){
         $(document).ready( function () {
        $('#datatable-suscripciones').DataTable({
          "serverSide":true,
          "ajax":"api/suscripciones",
          "columns":[
            {data:'id'},
            {data:'apartir_de'},
            {data:'fecha_final'},
           
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
      }

      
  }
    
}
</script>
