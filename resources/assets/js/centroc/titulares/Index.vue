<template>
  <div class="">

  <section class="content-header">
    <h1>
      Titulaes
      <small>Lista</small> <br><br>
      <button type="button" v-on:click="getTitular(3)" class=" btn btn-primary btn-sm" name="button">REGIÓN CENTRAL</button>
      <button type="button" v-on:click="getTitular(2)" class=" btn btn-primary btn-sm" name="button">REGIÓN ANTIOQUIA</button>
      <button type="button" v-on:click="getTitular(1)" class=" btn btn-primary btn-sm" name="button">REGIÓN CARIBE</button>
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
  <datatable-titular :key="region"  :region="region"></datatable-titular>
  </div>
</template>

<script>
import datatable from 'datatables'

export default {
  mounted() {
      console.log('Component mounted.')
  },
  data(){
    return{
      region:3
    }
  },
  methods:{
     getTitular(region){
        this.region = region;
        console.log(this.region);
     }
  }
}



</script>
