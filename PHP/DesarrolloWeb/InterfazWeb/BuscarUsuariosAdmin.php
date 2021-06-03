<?php
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    //INICIAMOS SESION
    session_start();
?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios AnimeTEK</title>
    <link rel="icon" href="../../../IMG/Logo/LogoFullTransparente.ico">
    <!--Links para las fuentes de Google Fonts.-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
    <!--Link para la versión de Bootstrap.-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Links para el footer.-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- LINK ESTILOS DE LA PÁGINA CSS  -->
    <link rel="stylesheet" href="../../../CSS/Estilos.css">
    <!-- SCRIPT PARA LOADER -->
    <script src="../../../JS/Loader.js"></script>

</head>
<body >
    <!--Loader.-->
    <?php include_once "Loader.php"?>


    <!-- CABECERA ANIMETEK -->
    <?php include_once 'CabeceraAnimeTEK.php';?>


    <!-- ESTE ES EL MENÚ DE NAVEGACIÓN DE ANIMETEK  -->
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark menu ">
            <a class="navbar-brand" href="Home.php">
                <img src="../../../IMG/Logo/LogoFullTransparente.ico" width="40" height="40" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fuenteMenu" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="Home.php">Home <span class="sr-only">Home</span></a>
                    <a class="nav-item nav-link " href="Catalogo.php">Catálogo</a>
                    <a class="nav-item nav-link " href="MasSobreAnimeTEK.php">Más sobre AnimeTEK</a>
                    <!-- ESTE INCLUDE CONTINE UNA PARTE DEL MENU QUE SOLO SE MUESTRA A USUARIOS ADMINISTRADORES -->
                    <?php include_once 'MenuAdministradores.php'?>
                      
            </div>
                
            <!-- ESTE INCLUDE CONTINE UNA PARTE DEL MENU QUE SOLO SE MUESTRA A USUARIOS  --> 
            <?php include_once 'MenuUsuarios.php';?>
        </nav>
        
    </div><br>
    <!-- VENTANA EMERGENTE LOGOUT -->
    <?php include_once 'VentanaEmergenteLogOut.php';?>
     <!-- VENTANA EMERGENTE PARA LOS USUARIOS AÑADIDOS -->
     <p>
        <?php
            if(isset($_GET['registrado']) && $_GET['registrado'] == "usuarioRegistrado"){ echo '
                <div class="modal" id="myModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">AnimeTEK</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¡ Se ha añadido un usuario correctamente!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>';}
        ?>
    </p>
  
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-8">
                <!--ESTAS SON LAS  MIGAS DE PAN -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active " aria-current="page">Home</li>
                        <li class="breadcrumb-item " aria-current="page">Administración de Usuarios</li>
                    </ol>
                </nav>

            </div>
            <!-- ESTE ES EL BOTON QUE LLEVA AL FORMULARIO INSERTAR USUARIO-->
            <div class="col-md-2">
                    <a href="InsertarNuevoUsuario.php" class="btn btn-success mb-1 col-md-12"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Añadir Usuario</a>
            </div>
              <!-- ESTE ES EL INPUT PARA BUSCAR EN LA TABLA USUARIOS -->       
            <div class="col-md-2">
                <form action="BuscarUsuariosAdmin.php" method="GET" class="mb-1">
                    <div class="input-group">
                        <input class="form-control " type="search" name="busquedaUsuario" id="busquedaUsuario" placeholder="Buscar..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn  text-light botonBuscar"  type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>                   
                </form>
            </div>  
        </div>
        <!-- ESTA ES LA TABLA QUE MUESTRA TODAS LOS USUARIOS EN LA BASE DE DATOS -->
        <div class="row mr-1 ml-1">
        
            <div class="table-responsive">
                <table class="table bg-light rounded ">
                    <!-- CABECERA DE LA TABLA CON LA CLASE BG DANGER PARA DARLE COLOR ROJO -->
                    <thead class="bg-danger text-center  ">
                    <tr>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Email</th>
                        <th scope="col">DNI</th>
                        <th scope="col">ROL</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <?php 
                        // PARA HACER EL BUSCAR RECOGEMOS EL TEXTO INTRODUCIDO EN EL INPUT BUSCAR MEDIANTE UN GET    
                        $variableBusqueda= $_GET['busquedaUsuario'];
                        // CON ESTA CONSULTA BUSCAMOS EN LA TABLA MYQLI SI ALGÚN REGISTRO COINCIDE
                        $buscarUsuarios= busquedUsuariosAdmin($conexion, $variableBusqueda); 
                        while($fila=mysqli_fetch_assoc($buscarUsuarios)){
                    ?>
                    <!-- SI EXISTE IMPRIMIMOS LOS DATOS -->
                    <tbody>
                        <tr>
                            <td><?php echo $fila['idUsuario'];?></td>
                            <td><?php echo $fila['Usuario'];?></td>
                            <td><?php echo $fila['Nombre'];?></td>
                            <td><?php echo $fila['PrimerApellido'];?></td>
                            <td><?php echo $fila['SegundoApellido'];?></td>
                            <td><?php echo $fila['Telefono'];?></td>
                            <td><?php echo $fila['Password'];?></td>
                            <td><?php echo $fila['Email'];?></td>
                            <td><?php echo $fila['DNI'];?></td>
                            <td><?php echo $fila['ROL'];?></td>
                            <td class="botonesTablasEdicion"><a href="ModificarUsuario.php?idUsuario=<?php echo $fila['idUsuario'];?>" class="btn btn-primary "><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Modificar</a><a href="ConfirmaEliminarUsuario.php?idUsuario=<?php echo $fila['idUsuario'];?>"  class="btn btn-danger "><i class="fas fa-user-minus"></i>&nbsp;&nbsp;Eliminar</a></td>
                            <?php
                            }
                            ?>
                        </tr>
                    
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <br>            
            </div>
        </div>
                
    </div>
    <br>
    <!-- ESTE INCLUDE ES EL FOOTER --> 
    <?php include_once "Footer.php"?>
    
    <!--Scripts-->
    <!-- SCRIPT FONT AWSOME PARA LOS ICONOS  --> 
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <!-- SCRIPT DE BOOTSTRAP  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- SCRIPT NECESARIO PARA JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>               
    <script src="../../../JS/Catalogo.js"></script>
</body>
</html>