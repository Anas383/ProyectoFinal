<?php
    session_start();
    //AQUI CONTROLAMOS QUE CUANDO EL ROL SEA USUARIO SE MUESTRE EL SIGUIENTE PANEL
    if($_SESSION['ROL']== 'Administrador' ){       
?>


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="desplegableAdministrador" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administración
        </a>
        <div class="dropdown-menu " aria-labelledby="desplegableAdministrador">
            <!-- ELEMENTOS DEL MENU DESPLEGABLE -->
            <a class="dropdown-item" href="AdministrarUsuarios.php">Usuarios</a>
            <!-- LINEA DIVISORIA -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="AdministrarProductos.php">Productos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="AdministrarCategorias.php">Categorías</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="AdministrarDirecciones.php">Direcciones</a>
        </div>
    </li>
<?php
    }
?>