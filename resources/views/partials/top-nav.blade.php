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
              <span>{{$noti->suscripcion->persona->nombres}}</span>
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
