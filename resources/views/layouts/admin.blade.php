<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@yield('style')
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
          <a href="index.html" class="site_title"><img style="width:75%;" src="/img/logo_ixtus_blanco.png" alt="..."></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
          <div class="profile_pic">
          <img src="/img/user.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
          <span>Bienvenido,</span>
          <h2>Javier Cera</h2>
          </div>
          </div>
           <!-- /menu prile quick info -->
        <br/>
        <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
          <h3>S. Admin</h3>
          <ul class="nav side-menu">
          <li>
            <a href="/ixtus´"><i class="fa fa-home"></i> Dashboard </a>
          </li>
          <li><a><i class="fa fa-user"></i> Personas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
                <li><a href="{{url('crear-persona')}}">Crear</a>
                </li>
                <li><a href="{{url('listar','General')}}">General</a>
                </li>
                <li><a href="{{url('listar','Benefactor')}}">Benefactor</a>
                </li>
                <li><a href="{{url('listar','Empleado')}}">Empleados</a>
                </li>
                <li><a href="{{url('listar','Servidores')}}">Servidores</a>
                </li>
                <li><a href="{{url('listar','Cliente')}}">Clientes</a>
                </li>
                <li><a href="{{url('listar','Proveedor')}}">Proveedores</a>
                </li>
            </ul>
            </li>
          <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
                <li><a href="{{url('usuario-crear')}}">Administrar</a>
                </li>
            </ul>
            </li>
          <li><a><i class="fa fa-book"></i> El Man esta Vivo <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
                <li><a href="{{url('suscripciones')}}">Suscripciones</a>
                </li>
           </li>
            </ul>
            </li>
          </div>
          <div class="menu_section">
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
          </div>
          <div class="menu_section">
          <h3>App Móvil</h3>
          <ul class="nav side-menu">
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
            <img src="/img/user.png" alt="">Javier Cera
            <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a href="javascript:;">  Perfil</a>
            </li>
            <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Salir</a>
            </li>
            </ul>
            </li>
            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-green">6</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
              <li>
                <a>
                  <span class="image">
                  <img src="/img/user.png" alt="Imagen de Perfil" />
                  </span>
                  <span>
                  <span>Usuario</span>
                  <span class="time">Hace 3 min...</span>
                  </span>
                  <span class="message">
                  Notificacion
                  </span>
                </a>
              </li>
              <li>
              <div class="text-center">
              <a>
              <strong>Ver Todas</strong>
              <i class="fa fa-angle-right"></i>
              </a>
              </div>
              </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
    <!-- page content -->
    @yield('content')
    @include('sweetalert::alert')
    <!-- /page content -->
  </div>
</div>
{{ Html::script('admin/js/bootstrap.min.js') }}
<!-- chart js -->

<!-- bootstrap progress js -->
{{ Html::script('admin/js/progressbar/bootstrap-progressbar.min.js') }}
{{ Html::script('admin/js/nicescroll/jquery.nicescroll.min.js') }}
<!-- icheck -->
{{ Html::script('admin/js/icheck/icheck.min.js') }}
{{ Html::script('admin/js/custom.js') }}
{{ Html::script('js/myjs.js') }}



@yield('scripts')

</body>
</html>
