<template>
  <!-- Content Wrapper. Contains page content -->
 <div>
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Seguimientos
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href=""><i class="fa fa-dashboard"></i> dashboard</a></li>
       <li>
         <router-link to="/titulares-index">
           Titulares
         </router-link>
       </li>

         <li class="active" ><i class="fa fa-book"></i>Notas</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- row -->
     <div class="row">
       <div class="col-md-8">
         <!-- The time line -->
         <ul class="timeline">
           <!-- timeline time label -->
           <li class="time-label">
                 <span class="bg-red">{{moment().format('DD/MM/YYYY')}}</span>
           </li>
           <!-- /.timeline-label -->
           <!-- timeline item -->
           <li v-for="nota in notas">
             <i class="fa fa-envelope bg-blue"></i>

             <div class="timeline-item">
               <span class="time"><i class="fa fa-clock-o"></i> {{nota.created_at}}</span>

               <h3 class="timeline-header"><a href="#">Asunto</a> {{nota.asunto}}</h3>

               <div class="timeline-body">
                 {{nota.mensaje}}
               </div>
               <div class="timeline-footer">
                 <a class="btn btn-danger btn-xs">Eliminar</a>
               </div>
             </div>
           </li>

           <li class="time-label">

           </li>


           <!-- END timeline item -->
           <li>
             <i class="fa fa-clock-o bg-gray"></i>
           </li>
         </ul>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->



   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

</template>

<script>
var moment =require('moment');
moment.locale('es');
export default {
  data(){
    return{
      notas:[],
      moment: moment
    }
  },
  created(){
    axios.get('api/notas/' + this.$route.params.id).then(res=>{
      this.notas = res.data;
    });
  },
  methods:{
    moment: function() {
    return moment();
    }
  }
}
</script>

<style lang="css">
</style>
