<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
              <h2>|<small>IXTUS</small></h2>
              <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="titulares" class="table responsive nowrap table-striped responsive-utilities jambo_table" style="width:100%">
                <thead>
                <tr>
                <th>ESTADO</th>
                <th># PLANILLA</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>DOCUMENTOS</th>
                <th>TELÉFONO</th>
                <th>ACCION</th>
                </tr>
                </thead>
                </table>
              </div>
            </div>
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
    $(document).ready( function () {
        $('#titulares').DataTable({
          "serverSide":true,
          "ajax":"api/reporte-regional/2",
          "columns":[
            {data:'estado'},
            {data:'tiempo'},
            {data:'nombres'},
            {data:'apellidos'},
            {data:'numero_documento'},
            {data:'telefono'},
            {data:'btn'},
          ],
          "language":{
            'url':'css/spanish.json'
          }
        });
    } );
  }

}
</script>

<style lang="css">
</style>
