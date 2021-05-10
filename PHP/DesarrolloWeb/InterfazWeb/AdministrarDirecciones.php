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
    <title>Administrar Direcciones AnimeTEK</title>
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
  
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <form action="BuscarDireccionAdmin.php" method="GET" class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control " type="search" name="busquedaDireccion" id="busquedaDireccion" placeholder="Buscar..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn  text-light botonBuscar"  type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>                   
                    </form>
                </div>
        </div>
        <div class="row">
        
            <div class="table-responsive col-md-12">
                <table class="table bg-light rounded ">
                    
                    <thead class="bg-danger text-center  ">
                    <tr>
                        <th scope="col">Id Domicilio</th>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Comunidad Autónoma</th>
                        <th scope="col">Calle</th>
                        <th scope="col">Número</th>
                        <th scope="col">Código Postal</th>
                        <th scope="col">Piso</th>
                        <th scope="col">Portal</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <?php 
                        $listarDirecciones= listarDirecciones($conexion); 
                        while($direcciones=mysqli_fetch_assoc($listarDirecciones)){
                    ?>
                    <tbody  >
                        <tr >
                            <td><?php echo $direcciones['idDomicilio'];?></td>
                            <td><?php echo $direcciones['idUsuarioCF'];?></td>
                            <?php 
                                $idUsuario=$direcciones['idUsuarioCF'];
                                $buscarUsuario=listarUsuariosId($conexion, $idUsuario);
                                $usuario=mysqli_fetch_assoc($buscarUsuario);
                            
                            ?>
                            <td><?php echo $usuario['Usuario'];?></td>
                            <td><?php echo $direcciones['Provincia'];?></td>
                            <td><?php echo $direcciones['ComunidadAutonoma'];?></td>
                            <td><?php echo $direcciones['Calle'];?></td>
                            <td><?php echo $direcciones['Numero'];?></td>
                            <td><?php echo $direcciones['CP'];?></td>
                            <td><?php echo $direcciones['Piso'];?></td>
                            <td><?php echo $direcciones['Portal'];?></td>
                            <td class="botonesTablasEdicion"><a href="ModificarDireccion.php?idUsuario=<?php echo $direcciones['idUsuarioCF'];?>" class="btn btn-primary "><i class="fas fa-pen"></i>&nbsp;&nbsp;Modificar</a><a href="ConfirmaEliminarDireccion.php?idDireccion=<?php echo $direcciones['idDomicilio']?>"  class="btn btn-danger "><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Eliminar</a></td>
                            
                            <?php
                            }
                            ?>
                        </tr>
                    
                    </tbody>
                </table>
            
            </div>
        
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