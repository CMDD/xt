<template>
<div class="">
    <section class="content-header">
      <h1>
        Sucripciones
        <small>Crear</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <router-link to="/dashboard">
            <i class="fa fa-dashboard" ></i>Dashboard
          </router-link>
        </li>
        <li>
        <router-link to="/suscripcion/lista">
          <i class="fa fa-book" ></i>Titulares
        </router-link>
        </li>
        <li class="active" ><i class="fa fa-pencil"></i>Crear</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Main content -->
      <section class="content">
    <form @submit.prevent="crearSuscripcion">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos Principales</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Nombres</label>
                  <input  v-model="form.nombres"  class="form-control"  required  placeholder="Ingresar nombres">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Apellidos</label>
                  <input v-model="form.apellidos" type="text" class="form-control" required   placeholder="Ingrese apellidos">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Cedula</label>
                  <input v-model="form.cedula" type="text" class="form-control" onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"  required  placeholder="Ingrese cedula,">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Correo</label>
                  <input type="email" class="form-control" v-model="form.correo"  placeholder="Ingrese correo">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Télefono - Celular</label>
                  <input type="text" class="form-control" v-model="form.telefono" placeholder="Ingresar nombres">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Fecha de nacimiento</label>
                  <input type="date" class="form-control" v-model="form.fecha_nacimiento">
                </div>
              </div>
              <!-- /.box-body -->
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
                  <label for="exampleInputEmail1">Dirección</label>
                  <input type="text" class="form-control" v-model="form.direccion"   placeholder="Ingresar nombre completo">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Region</label>
                  <input type="text" class="form-control" v-model="form.region_id"  placeholder="Ingresar país">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Departamento</label>
                  <input type="text" class="form-control" v-model="form.departamento"   placeholder="Ingresar estado">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Municipio</label>
                  <input type="text" class="form-control" v-model="form.zipcode"   placeholder="Ingresar ZIPcode">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">telefono</label>
                  <input type="text" class="form-control" v-model="form.telefono"   placeholder="Ingresar ciudad">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Ocupacion</label>
                  <input type="text" class="form-control" v-model="form.ocupacion"   placeholder="Ingrese dirección">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Preferencias</label>
                  <input type="text" class="form-control" v-model="form.interes"   placeholder="Ingrese dirección">
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Observación</label>
                  <textarea v-model="form.observacion" class="form-control" rows="5" cols="80"></textarea>
                </div>
              </div>
              <!-- /.box-body -->
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
                  <input type="number" min="0" v-model="form.jovenes" class="form-control" value="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Adultos</label>
                  <input type="number" min="0" v-model="form.adultos"  class="form-control"  value="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Niños</label>
                  <input type="number" min="0" v-model="form.ninos" class="form-control" value="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Puerta a la palabra</label>
                  <input type="number" min="0"  v-model="form.puerta"  class="form-control" value="0">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Fecha de pago</label>
                  <input type="date" required v-model="form.fecha_pago"class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Enviar a partir de:</label>
                  <input type="date" class="form-control" v-model="form.fecha_inicio" name="inicio">
                </div>
                <div class="form-group">
                  <label>Tiempo de la suscripción</label>
                  <select class="form-control"  v-model="form.tiempo" >
                    <option  value="">Seleccione...</option>
                    <option value="6" >6 Meses</option>
                    <option value="12" >1 Año</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Numero de suscripción</label>
                  <input type="text" class="form-control" v-model="form.numero_suscripcion">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Numero de Factura</label>
                  <input type="text" id="exampleInputFile" class="form-control" v-model="form.numero_factura">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" :disabled="enviando" >
                  <span v-if="enviando">Enviando...</span>
                  <span v-else>Crear suscripción</span>
                </button>
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
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return{
            enviando:false,
            form:{
              nombres:'',
              apellidos:'',
              cedula:'',
              correo:'',
              telefono:'',
              fecha_nacimiento:'',
              nombre_recibe:'',

            }
          }
        },
        computed:{

        },
        methods:{
          getTitular(){
            axios.get('titular'+ 1).then(res =>{

           });
          }


        }
    }
</script>
