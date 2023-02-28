    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Nombre</p>
          <p class="app-sidebar__user-designation">Rol</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url(); ?>/dashboard"><i class="app-menu__icon fa fa-home" aria-hidden="true"></i></i><span class="app-menu__label">Inicio</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users" aria-hidden="true"></i></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i>Usuarios</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/roles" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i>Roles</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/permisos"><i class="icon fa fa-circle-o"></i>Permisos</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span class="app-menu__label">Personas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>/clientes"><i class="icon fa fa-circle-o"></i>Clientes</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/proveedores"><i class="icon fa fa-circle-o"></i>Proveedores</a></li>
          </ul>
      </li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>/ventas"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Ventas</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>/compras"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Compras</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>/inventario"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Inventario</span></a></li>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>