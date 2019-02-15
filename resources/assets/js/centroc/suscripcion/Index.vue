<template>
  <div class="">

  <section class="content-header">
    <h1>
      Sucripciones
      <small>Listas</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <router-link to="/dashboard">
          <i class="fa fa-dashboard"></i> Dashboard
        </router-link>
      </li>
      <li class="active" ><i class="fa fa-book"></i>Mis suscripciones</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Suscripciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable-suscripciones" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Estado</th>
                  <th>T/Mes</th>
                  <th>Fecha de pago</th>
                  <th>Fecha de inicio</th>
                  <th>Fecha de corte</th>
                  <th>Titular</th>
                  <th>Cedula</th>
                  <th>Acción</th>
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
            {data:'estado'},
            {data:'plan'},
            {data:'plan'},
            {data:'plan'},
            {data:'plan'},
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

  }

}



</script>
