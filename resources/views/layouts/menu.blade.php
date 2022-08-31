<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Configuracion</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/anios">Periodo Escolar</a>
      <a class="dropdown-item" href="#">Grado</a>
      <a class="dropdown-item" href="#">Seccion</a>
      <div class="dropdown-divider"></div>
      <a class="nav-link" href="/usuarios">
        <i class=" fas fa-building"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="/roles">
        <i class=" fas fa-building"></i><span>Roles</span>
    </a>
    </div>


</li>
