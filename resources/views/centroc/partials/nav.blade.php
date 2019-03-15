<ul class="sidebar-menu" data-widget="tree">
  <li class="header">NAVEGACIÓN</li>
  <!-- Optionally, you can add icons to the links -->
  <li ><a href="#" ><i class="fa fa-dashboard" ></i> Dashboard</a></li>


  <li class="treeview">
    <a href="#"><i class="fa fa-book"></i> <span>Suscripcion</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li >
        <router-link to="/suscripciones-index"><i class="fa fa-eye" ></i>Suscripciones</router-link>
      </li>
      <li ><a href="#" ><i class="fa fa-pencil" ></i>Crear Suscripcion</a> </li>
      <li >
        <router-link to="/reporte/suscripcion"><i class="fa fa-eye" ></i>Reporte</router-link>
      </li>
    </ul>

  </li>
  <li class="treeview {{ request()->is('articulos') ? 'active' : ''}}">
    <a href="#"><i class="fa fa-bars"></i> <span>Titulares</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li {{ request()->is('articulos') ? 'class=active' : ''}}>
      <li >
        <router-link to="/titulares-index"><i class="fa fa-eye" ></i>Titulares</router-link>
      </li>
      </li>
      <li>
        <router-link to="/titular-create"><i class="fa fa-pencil" ></i> Crear Titulares</router-link>
      </li>

    </ul>
  </li>
</ul>
