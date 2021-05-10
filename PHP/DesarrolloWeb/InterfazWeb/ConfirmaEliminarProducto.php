<?php

    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    require '../../BD/Config.php';
    $conexion=conectar(true);
    session_start();
?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil <?php echo $_SESSION['Usuario'];?> AnimeTEK</title>
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
        
    <div class="container">
        <div class="contenedorPerfil">
           
            <h2>¿Estás seguro de eliminar este producto?</h2><br>
            <?php 
            
            $idProducto= $_GET['idProducto'];
            $buscarProducto=buscarProductoPorID($conexion, $idProducto);
            $producto=mysqli_fetch_assoc($buscarProducto);
            $idCategoria=$producto['idCategoria'];
            $buscarCategoria=buscarCategoriaPorID($conexion,$idCategoria);
            $categoria=mysqli_fetch_assoc($buscarCategoria);
          
            
            ?>
            <p style="text-align: center; "><img src="data:image/jpeg;base64,<?php echo base64_encode($producto['Imagen']);?>" class="img-responsive border border-dark rounded " width="300rem" alingh height="300rem" alt="" ></p><br>
            <h2 style="text-align: center;">Detalles del Producto </h2><br>
            <span><b>ID del producto:</b>&nbsp;&nbsp;<?php echo $producto['idProducto'];?></span><br><br>
            <span><b>Nombre del Producto:</b>&nbsp;&nbsp;<?php echo $producto['NombreProducto'];?><br><br>
            <span><b>ID categoría:</b>&nbsp;&nbsp;<?php echo $producto['idCategoria'];?></span><br><br>
            <span><b>Nombre categoría:</b>&nbsp;&nbsp;<?php echo $categoria['NombreCategoria'];?></span><br><br>
            <span><b>Detalles del Producto:</b><br><?php echo $producto['DetallesProducto'];?></span><br><br>
            <span><b>Precio:</b>&nbsp;&nbsp;<?php echo $producto['Precio'];?> €</span><br><br>
            <span><b>Stock:</b>&nbsp;&nbsp;<?php echo $producto['Stock'];?> unidades</span><br><br>
            <div class="row">
               <a href="EliminarProducto.php?idProducto=<?php echo $producto['idProducto'];?>" class="btn btn-success btn-lg col-md-5 ">Confirmar</a>
               <div class="col-md-2"></div>
               <a href="AdministrarProductos.php" class="btn btn-danger btn-lg col-md-5">Cancelar</a>
                
            </div>
           
            
        </div><br>
    </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>