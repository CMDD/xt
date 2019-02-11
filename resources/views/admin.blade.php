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

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<link rel="stylesheet" href="/css/app.css">
</head>
<body class="nav-md">
  <div id="app" class="container body">
    <div class="main_container">

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
          @include('partials.nav')
          <!-- /sidebar menu -->
      </div>
      </div>
     <!-- top navigation -->
     @include('partials.top-nav')
    <!-- page content -->
    <titular-index></titular-index>
    <!-- /page content -->
  </div>
</div>
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}
{{ Html::script('admin/js/bootstrap.min.js') }}
{{ Html::script('js/app.js') }}

<!-- bootstrap progress js -->
{{ Html::script('admin/js/progressbar/bootstrap-progressbar.min.js') }}
{{ Html::script('admin/js/nicescroll/jquery.nicescroll.min.js') }}



</body>
</html>
