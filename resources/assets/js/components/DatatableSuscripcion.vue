<template>
  <section class="content container-fluid">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Titulares</h3> <br>
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
                  <th>SEGUIMIENTO</th>
                  <th>ACCION</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <modal-nota></modal-nota>
  </section>
</template>

<script>
export default {

}
</script>

<style lang="css">
</style>
