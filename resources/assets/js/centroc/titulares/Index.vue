<template>
  <div class="">

  <section class="content-header">
    <h1>
      Titulaes
      <small>Lista</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <router-link to="/dashboard">
          <i class="fa fa-dashboard"></i> Dashboard
        </router-link>
      </li>
      <li class="active" ><i class="fa fa-book"></i>Titulares</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Artículos</h3> <br>
              <button type="button" v-on:click="getTitular(3)" class="pull-right btn btn-primary btn-sm" name="button">REGIÓN CENTRAL</button>
              <button type="button" v-on:click="getTitular(2)" class="pull-right btn btn-primary btn-sm" name="button">REGIÓN ANTIOQUIA</button>
              <button type="button" v-on:click="getTitular(1)" class="pull-right btn btn-primary btn-sm" name="button">REGIÓN CARIBE</button>
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
  </div>
</template>

<script>
import datatable from 'datatables'

export default {
  mounted() {
      console.log('Component mounted.')
  },
  created(){
    $(document).ready( function () {
      $('#datatable-suscripciones').DataTable({
        "serverSide":true,
        "ajax":"api/suscripciones",
        "columns":[
          {data:'estado_sus'},
          {data:'tiempo'},
          {data:'fecha_pago'},
          {data:'fecha_inicio'},
          {data:'fecha_corte'},
          {data:'titular'},
          {data:'cedula'},
          {data:'btn'},
        ],
        "language":{
          'url':'css/spanish.json'
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
      getTitular(id){

      
        this.getTable(id);

      },

      getTable(id){
        $(document).ready( function () {
            $('#datatable-titulares').DataTable({
              "serverSide":true,
              "ajax":'/api/ixtus-titular/'+id,
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
                'url':'/css/spanish.json'
              }
            });
        } );

      }

  }



}



</script>
