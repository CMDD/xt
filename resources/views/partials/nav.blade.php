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
