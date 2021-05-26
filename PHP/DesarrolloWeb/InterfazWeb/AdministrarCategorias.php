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
    <title>Administrar Categorías AnimeTEK</title>
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
        <div class="row">
        <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">Home</li>
                        <li class="breadcrumb-item  " aria-current="page">Administración de Categorías</li>
                        
                    </ol>
                </nav>
            </div>
            <div class="col-md-2"><a href="InsertarNuevaCategoria.php" class="btn btn-success mb-1 col-md-12"><i class="fas fa-plus"></i> &nbsp;Añadir Categoría</a></div>
            
            <div class="col-md-2">
                <form action="BuscarCategoriasAdmin.php" method="GET" class=" mb-1 ">
                    <div class="input-group">
                        <input class="form-control " type="search" name="busquedaCategoria" id="busquedaCategoria" placeholder="Buscar..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn  text-light botonBuscar"  type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>                   
                </form>
            
            </div>
        </div>
        <div class="row">
        <div class="table-responsive col-md-12">
            <table class="table bg-light rounded   text-center">
                
                <thead class="bg-danger  ">
                <tr>
                    <th scope="col">Id Categoria</th>
                    <th scope="col">Nombre de la categoría</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <?php 
                    $listarCategorias= listarCategorias($conexion); 
                    while($categorias=mysqli_fetch_assoc($listarCategorias)){
                        
                ?>
                <tbody>
                    <tr >
                        <td><?php echo $categorias['idCategoria'];?></td>
                        <td><?php echo $categorias['NombreCategoria'];?></td>
                        <td><?php echo $categorias['DescripcionCategoria'];?></td>
                        <td class="botonesTablasEdicion"><a href="ModificarCategoria.php?idCategoria=<?php echo $categorias['idCategoria'];?>" class="btn btn-primary "><i class="fas fa-pen"></i>&nbsp;&nbsp;Modificar</a><a href="ConfirmarCategoriaEliminada.php?idCategoria=<?php echo $categorias['idCategoria'];?>" class="btn btn-danger "><i class="fas fa-times"></i>&nbsp;&nbsp;Eliminar</a></td>
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
    <?php include_once "Footer.php"?>
    
    <!--Scripts-->  
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="../../../JS/Catalogo.js"></script> 
</body>
</html>