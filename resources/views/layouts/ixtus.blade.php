<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="user" content="{{ Auth::User() }}">
<title>IXTUS Minuto de Dios | </title>
<!-- Bootstrap core CSS -->
{{ Html::style('admin/css/bootstrap.min.css') }}
{{ Html::style('admin/fonts/css/font-awesome.min.css') }}
{{ Html::style('admin/css/animate.min.css') }}
{{ Html::style('css/mystyle.css') }}
<!-- Custom styling plus plugins -->
{{ Html::style('admin/css/custom.css') }}
{{ Html::style('admin/css/icheck/flat/green.css') }}
{{ Html::script('admin/js/jquery.min.js') }}
@yield('style')
</head>
<body class="nav-md">
  <div class="container body">
    <div id="app" class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
          <a href="/ixtus" class="site_title"><img style="width:75%;" src="/img/logo_ixtus_blanco.png" alt="..."></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
          <div class="profile_pic">
          <img src="/img/user.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
          <span>Bienvenido,</span>
          <h2>{{Auth::User()->name}}</h2>
          </div>
          </div>
           <!-- /menu prile quick info -->
        <br/>
        <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
          <h3>-</h3>
          <ul class="nav side-menu">
          <li>
            <a href="/ixtus"><i class="fa fa-home"></i> Dashboard </a>
          </li>

          <li><a><i class="fa fa-user"></i> Titular <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
                @can('crear.titular')
                <li><a href="{{route('crear.titular')}}">Crear</a>
                </li>
                @endcan
                @can('listar.titular')
                <li><a href="{{route('listar.titular','General')}}">Lista</a>
                </li>
                @endcan
            </ul>
          </li>

          <li>
            <a><i class="fa fa-book"></i> Suscripciones <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
              @can('crear.suscripcion')
                <li>
                  <a href="{{route('crear.suscripcion')}}">Crear</a>
                </li>
                @endcan
                @can('listar.suscripcion')
                <li>
                  <a href="{{url('suscripciones')}}">Lista</a>
                </li>
                @endcan
            </ul>
           </li>
          <li>
            <a><i class="fa fa-child"></i> Donaciones <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                @can('crear.donacion')
                <!-- <li>
                  <a href="{{route('crear.donacion')}}">Crear</a>
                </li> -->
                @endcan
                @can('listar.donaciones')
                <li>
                  <a href="{{route('listar.donaciones')}}">lista</a>
                </li>
                @endcan
              </ul>
          </li>

          <li>
            <a><i class="fa fa-gears"></i> Configuración<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
              @can('crear.roles')
                <li>
                  <a href="{{route('crear.roles')}}">Roles</a>
                </li>
              @endcan
                @can('crear.usuario')
                <li>
                  <a href="{{url('usuario-crear')}}">Usuarios</a>
                </li>
                @endcan
            </ul>
         </li>
          </div>
          <!-- <div class="menu_section">
          <h3>Call Center</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-phone"></i> Llamadas <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="{{url('llamar')}}">Hacer llamada</a>
                  </li>
                  <li><a href="{{url('llamadas')}}">Todas</a>
                  </li>
                  <li><a href="{{url('llamadas-server')}}">Server</a>
                  </li>
             </li>
          </ul>
          </div> -->
          <div class="menu_section">
          <h3>Centro de contacto</h3>
          <ul class="nav side-menu">
            <!-- <li>
              <a><i class="fa fa-child"></i> Seguimiento <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                  <li>
                    <a href="{{url('centroc')}}">Gestion</a>
                  </li>
                </ul>
            </li> -->
          </ul>
          </div>
          </div>
          <!-- /sidebar menu -->
          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
          </div>
        <!-- /menu footer buttons -->
      </div>
      </div>
     <!-- top navigation -->
     <div class="top_nav">
       <div class="nav_menu">
         <nav class="" role="navigation">
           <div class="nav toggle">
           <a id="menu_toggle"><i class="fa fa-bars"></i></a>
           </div>
           <ul class="nav navbar-nav navbar-right">
             <li class="">
             <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <img src="/img/user.png" alt="">{{Auth::User()->name}}
             <span class=" fa fa-angle-down"></span>
             </a>
             <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
             <!-- <li><a href="javascript:;">  Perfil</a>
             </li> -->
             <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Salir</a>
             </li>
             </ul>
             </li>
             <li class="">
             <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <img src="" alt="">Soporte
             <span class=" fa fa-angle-down"></span>
             </a>
             <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
             <li><a data-toggle="modal" data-target=".titulares"  href="">  General</a>
             </li>

             </ul>
             </li>
             <li role="presentation" class="dropdown">
               <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
               <i class="fa fa-bell"></i>
               <span class="badge bg-green">{{Session::get('noti')}}</span>
               </a>
               <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                 @foreach(Session::get('notis') as $noti)
               <li>
                 <a href="{{route('ver.suscripcion',$noti->suscripcion->id)}}">
                   <span class="image">
                   <img src="/img/user.png" alt="Imagen de Perfil" />
                   </span>
                   <span>
                     @if(isset($noti->suscripcion->persona->nombres))
                   <span>{{$noti->suscripcion->persona->nombres}}</span>
                   @else
                    <span>No tiene nombre</span>
                   @endif
                   </span>
                   <span class="message">
                   {{$noti->mensaje}}
                   </span>
                   <span  class="time">
                     <a href="#" onclick="eliminarNotificacion({{$noti->id}})" class="borrar">Eliminar</a>
                   </span>
                 </a>
               </li>
               @endforeach

               <li>
               <div class="text-center">

               </div>
               </li>
               </ul>
             </li>
           </ul>
         </nav>
       </div>
     </div>
     <!-- /top navigation -->
     <!-- <div class="modal fade titulares" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-md">
         <div class="modal-content">
           <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <h4 class="modal-title" id="myModalLabel2">SOPORTE GENERAL</h4>
           </div>
           <div class="modal-body">
               <form class="" action="{{url('soporte')}}"  method="post">
           {!!csrf_field()!!}
           <div class="form-group">
             <label for="">Asunto</label>
             <input type="text" class="form-control" id="" name="asunto" placeholder="">
           </div>
           <div class="form-group">
             <label for="">Mensaje</label>
             <textarea name="mensaje" class="form-control" rows="3" cols="80"></textarea>
           </div>
           <div class="form-group">
             <label for="">Enviar a: </label>
             <select class="form-control" name="usuario">
               <option value="">Seleccione...</option>

             </select>
             <p class="help-block">Ixtus service</p>
           </div>

           <div class="modal-footer">
           <button type="button" style="margin-top:1%;" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
           <button type="submit" class="btn btn-primary">ENVIAR</button>
           </div>

         </form>
           </div>
         </div>
       </div>
     </div> -->
    <!-- page content -->
    @yield('content')
    @include('sweetalert::alert')
    <!-- /page content -->
  </div>
</div>
<script src="/js/app.js"></script>

{{ Html::script('admin/js/bootstrap.min.js') }}
<!-- chart js -->
<!-- bootstrap progress js -->
{{ Html::script('admin/js/progressbar/bootstrap-progressbar.min.js') }}
{{ Html::script('admin/js/nicescroll/jquery.nicescroll.min.js') }}
<!-- icheck -->
{{ Html::script('admin/js/icheck/icheck.min.js') }}
{{ Html::script('admin/js/custom.js') }}
<!-- {{ Html::script('js/ixtus.js') }} -->


@yield('scripts')
</body>
</html>
