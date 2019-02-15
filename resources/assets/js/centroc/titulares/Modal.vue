<template >
  <div class="modal fade" id="modal-default" >
    <form class="" @submit.prevent="crearNota">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">CREAR NOTA</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="usr">Asunto:</label>
                  <input type="text"  required v-model="form.asunto" class="form-control" id="usr">
                </div>
                <div class="form-group">
                  <label for="usr">Mensaje:</label>
                  <textarea name="name" required v-model="form.mensaje" class="form-control" rows="8" cols="80"></textarea>
                </div>
                <div class="form-group">
                  <label for="usr">Recordatorio:</label>
                  <input type="date" class="form-control" name="" value="">
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Crear nota</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          </form>
  </div>
        <!-- /.modal -->

</template>

<script>
import toastr from 'toastr'
toastr.options ={
  "closeButton": true,
  "timeOut": "10000",
  // "progressBar": true,
};
let user =document.head.querySelector('meta[name="user"]');
var userid = JSON.parse(user.content).id;
var titular;


export default {
  data(){
    return{
      form:{
        user_id:'',
        titular_id:'',
        asunto:'',
        mensaje:''
      }
    }
  },
  created(){
     $(document).on("click", ".idtitular", function ()  {
         titular = $(this).data('id');
      });
    },
    methods:{
      crearNota(){
        this.form.user_id = userid;
        this.form.titular_id = titular;
        console.log(this.form);
        axios.post('api/crear-nota',this.form).then(res=>{
          console.log(res.data);
          this.form = {
            user_id:'',
            titular_id:'',
            asunto:'',
            mensaje:''
          }
          toastr.success('Se creó la nota correctamente');
        });
      }

    }


  }
</script>

<style lang="css">
</style>
