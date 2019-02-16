<template>
  <div class="">
      <section class="content-header">
        <h1>
          Sucripciones
          <small>Detalle</small>
        </h1>
        <ol class="breadcrumb">
          <li>
            <router-link to="/dashboard">
              <i class="fa fa-dashboard"></i> Dashboard
            </router-link>
          </li>
          <li>
          <router-link to="/suscripciones-index">
            <i class="fa fa-book" ></i>Suscripciones
          </router-link>
          </li>
          <li class="active" ><i class="fa fa-pencil"></i>Detalle</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content container-fluid">
        <!-- Main content -->
        <section class="content">
      <form  @submit.prevent="actualizar">
        <div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Datos de quien compra la suscripcion</h3>
              </div>

                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nombres</label>
                    <input  v-model="titular.nombres"  class="form-control" disabled    placeholder="Ingresar nombres">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Apellidos</label>
                    <input v-model="titular.apellidos" type="text" class="form-control"  disabled   placeholder="Ingrese apellidos">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Cedula</label>
                    <input v-model="titular.numero_documento" type="text" class="form-control" disabled onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"    placeholder="Ingrese cedula,">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Correo</label>
                    <input type="email" class="form-control" v-model="titular.correo" disabled  placeholder="Ingrese correo">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Télefono - Celular</label>
                    <input type="text" class="form-control" v-model="titular.telefono" disabled placeholder="Ingresar nombres">
                  </div>
                </div>

            </div>
            <!-- /.box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Datos de entrega</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nombre de quien recibe</label>
                    <input type="text" class="form-control" v-model="form.nombre_recibe" :disabled="editar"   placeholder="Ingresar nombre completo">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Region</label>
                    <input type="text"  class="form-control" v-if="form.region" v-model="form.region['nombre']" disabled  placeholder="Ingresar ciudad">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Municipio</label>
                    <input type="text"  class="form-control" v-if="form.region"  v-model="form.municipio['nombre']" disabled  placeholder="Ingresar ciudad">
                  </div>


                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" class="form-control" v-model="form.direccion" :disabled="editar"   placeholder="Ingresar ciudad">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Observación</label>
                    <textarea v-model="form.observacion" class="form-control" :disabled="editar"  rows="5" cols="80"></textarea>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button v-if="!editar" type="submit" :disabled="actualizando" class="btn btn-primary"  >
                    <span v-if="actualizando" >Actualizando...</span>
                    <span v-else>Actualizar</span>
                  </button>
                  <div v-if="editar" class="">
                    <span  class="btn btn-primary" v-on:click="activarEdicion">Editar</span>

                  </div>
                </div>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Datos de la suscripción</h3>
              </div>

                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Jovenes</label>
                    <input type="number" min="0" v-model="form.jovenes" :disabled="editar"  class="form-control" value="0">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Adultos</label>
                    <input type="number" min="0" v-model="form.adultos" :disabled="editar"   class="form-control"  value="0">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Niños</label>
                    <input type="number" min="0" v-model="form.ninos" :disabled="editar"  class="form-control" value="0">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Puerta a la palabra</label>
                    <input type="number" min="0"  v-model="form.puerta" :disabled="editar"   class="form-control" value="0">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de pago</label>
                    <input type="text" required v-model="form.fecha_inicio"class="form-control" disabled >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Enviar a partir de:</label>
                    <input type="text" class="form-control" v-model="form.apartir_de" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de vencimiento:</label>
                    <input type="text" class="form-control" v-model="form.fecha_final" disabled>
                  </div>
                  <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control"  v-model="form.estado" :disabled="editar"  >
                      <option value="Activo" >Activo</option>
                      <option value="Desactivo" >Desactivo</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tiempo de la suscripción</label>
                    <select class="form-control"  v-model="form.plan" disabled  >
                      <option value="6" >6 Meses</option>
                      <option value="12" >1 Año</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numero de suscripción</label>
                    <input type="text" class="form-control" :disabled="editar"  v-model="form.numero_suscripcion">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Numero de Factura</label>
                    <input type="text" id="exampleInputFile" :disabled="editar"  class="form-control" v-model="form.numero_factura">
                  </div>
                  <div class="form-group">
                    <label for="">Punto de venta</label>
                    <select :disabled="editar" v-model="form.punto_venta"  class="form-control" name="punto">
                      <option v-bind:value="form.punto_venta">{{form.punto_venta}}</option>
                      <option value="Efecty">Efecty</option>
                      <option value="Corporación minuto de Dios">Corporación minuto de Dios</option>
                      <option value="Centro de Contacto">Centro de Contacto</option>
                      <option value="Libreria Minuto de Dios">Libreria Minuto de Dios </option>
                      <option value="Libreria - Soledad">Libreria - Soledad </option>
                      <option value="Libreria - Cedritos">Libreria - Cedritos </option>
                      <option value="Libreria - Ibague">Libreria - Ibague </option>
                      <option value="Libreria - Antioquia Centro">Libreria - Antioquia Centro </option>
                      <option value="Libreria - Antioquia Laureles">Libreria - Antioquia Laureles </option>
                      <option value="Libreria - Antioquia Itagui">Libreria - Antioquia Itagui </option>
                      <option value="Libreria - Cartagena Pie de la popa">Libreria - Cartagena Pie de la popa </option>
                      <option value="Libreria - Cartagena Plazuela">Libreria - Cartagena Plazuela </option>
                      <option value="Libreria - Barranquilla Tierra nueva">Libreria - Barranquilla Tierra nueva </option>
                      <option value="Libreria - Barranquilla Sao calle 53">Libreria - Barranquilla Sao calle 53 </option>
                      <option value="Libreria - Barranquilla Sao calle 93">Libreria - Barranquilla Sao calle 93 </option>
                      <option value="Tiendaminutodedios.com">Tiendaminutodedios.com</option>
                    </select>
                  </div>
                </div>

            </div>
            <!-- /.box -->
          </div>
          <!--/.col (right) -->
        </div>
      </form>
    </section>
    <!-- /.content -->
    </section>
  </div>
</template>
<script>
import toastr from 'toastr'
toastr.options ={
  "closeButton": true,
  "timeOut": "10000",
  // "progressBar": true,
};
  export default{
    data(){
      return {
        form:{

        },
        regiones:[],
        departamentos:[],
        titular:{},
        editar:'true',
        actualizando:''
      }
    },
      mounted(){

      },
      created(){
        axios.get('/api/suscripcion/' + this.$route.params.id).then(res=>{
          this.form = res.data[0];
          this.titular = res.data[0].persona;
        });
      },
      methods:{
        activarEdicion(){
          this.editar = false;
          this.actualizando = false;
        },
        actualizar(){
          this.actualizando = true;
          axios.post('/api/actualizar-suscripcion',this.form).then(res=>{
            console.log(res.data);
            this.editar = true;
            toastr.success('Se actualizó correctamente');
            this.actualizando = true;
          });
        }
      }


  }
</script>
