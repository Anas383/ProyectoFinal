<?php

    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    $conexion=conectar(true);
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
        <link rel="stylesheet" href="../../../CSS/Estilos.css">
        <script src="../../../JS/Loader.js"></script>

</head>
<body >
    <!--Loader.-->
    <?php include_once "Loader.php"?>


    <!-- CABECERA PARA HOME ANIMETEK -->
    <header class="cabecera d-none d-sm-none d-md-block">
        <center>
            <img src="../../../IMG/Anime.png"alt="" srcset=""><img src="../../../IMG/TEK.png" width="200px" height="150px" alt="" srcset="">
        </center>      
    </header>


    <!-- MENÚ ANIMETEK  -->
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
                    <?php include_once 'MenuAdministradores.php'?>
                      
                </div>
                
            
            <?php include_once 'MenuUsuarios.php';?>
        </nav>
        
    </div><br>

    <?php include_once 'VentanaEmergenteLogOut.php';?>
     <!-- VENTANA EMERGENTE PARA LOS USUARIOS AÑADIDOS -->
     <p>
        <?php
            if(isset($_GET['registrado']) && $_GET['registrado'] == "usuarioRegistrado"){ echo '
                <div class="modal" id="myModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registro exitoso.</h5>
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
        <a href="InsertarNuevoUsuario.php" class="btn btn-success mb-1"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Añadir Usuario</a>
        <div class="table-responsive">
            <table class="table bg-light rounded ">
                
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
                    $listarUsuarios= listarUsuarios($conexion); 
                    while($fila=mysqli_fetch_assoc($listarUsuarios)){
                ?>
                <tbody  >
                    <tr >
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
                        <td class="botonesTablasEdicion"><a href="ModificarUsuario.php?idUsuario=<?php echo $fila['idUsuario'];?>" class="btn btn-primary "><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Modificar</a><a href="#" data-toggle="modal" data-target="#emergenteEliminarUsuario"  class="btn btn-danger "><i class="fas fa-user-minus"></i>&nbsp;&nbsp;Eliminar</a></td>
                        <?php include_once 'EmergenteEliminarUsuario.php'?>
                        <?php
                        }
                        ?>
                    </tr>
                
                </tbody>
            </table>
        
        </div>
    </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    <script src="../../../JS/Home.js"></script>  
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>