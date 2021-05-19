<?php
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
require '../../BD/DAOProductos.php';
require '../../BD/Config.php';
$conexion=conectar(true);
session_start();
$idProducto=$_GET['idProducto'];
$idUsuario=$_SESSION['idUsuario'];


?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Producto AnimeTEK</title>
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

            <?php 
                
                $idProducto= $_GET['idProducto'];
                $buscarProducto=buscarProductoPorID($conexion, $idProducto);
                $producto=mysqli_fetch_assoc($buscarProducto);
                $idCategoria=$producto['idCategoria'];
                $buscarCategoria=buscarCategoriaPorID($conexion,$idCategoria);
                $categoria=mysqli_fetch_assoc($buscarCategoria);
            
                
            ?>
            <h2><?php echo $producto['NombreProducto'];?></h2><br>
            <p style="text-align: center; "><img src="data:image/jpeg;base64,<?php echo base64_encode($producto['Imagen']);?>" class="img-responsive border border-dark rounded " width="400rem"  height="300rem" alt="" ></p><br>
            <hr>
            <p>Calificacion: </p>
            
                
            <hr>
            <h2>Detalles del Producto </h2><br>

            <span><b>Categoría:</b>&nbsp;&nbsp;<?php echo $categoria['NombreCategoria'];?></span><br><br>
            <span><b>Detalles del Producto:</b><br><?php echo $producto['DetallesProducto'];?></span><br><br>
            <span><b>Precio:</b>&nbsp;&nbsp;<?php echo $producto['Precio'];?> €</span><br><br>
            <span><b>Stock:</b>&nbsp;&nbsp;<?php echo $producto['Stock'];?> unidades</span><br><br>
            <?php

                if($_SESSION['usuarioConectado']==false){

            ?>
            <div class="row ">
                <div class="col-md-4"></div>
                <button class="btn btn-success mt-1 enviar col-md-4" style=" font-family: 'Fredoka One', cursive;"  name="iniciSesion"><i class="fas fa-cart-plus"></i> &nbsp;Inicia Sesion </button>
                <div class="col-md-4"></div>
            </div>
            
            <?php    
                }elseif($_SESSION['usuarioConectado']==true){

            ?>  
            <div class="row ">
                <div class="col-md-4"></div>
                <button class="btn btn-success mt-1 enviar col-md-4" style=" font-family: 'Fredoka One', cursive;"  name="btnAccion" data-id="<?php echo $producto['idProducto'];?>" data-precio="<?php echo $producto['Precio']; ?>"   data-cantidad="<?php echo 1; ?>" ><i class="fas fa-cart-plus"></i> &nbsp;Añadir al carrito </button>
                <div class="col-md-4"></div>
            </div>
             <br>   
            <?php

                }  
            ?> 
            <?php

                if($_SESSION['usuarioConectado']==false){

            ?> 
            <?php    
                }elseif($_SESSION['usuarioConectado']==true){

            ?>
            <h2>Comentarios</h2><br>

                <div class="input-group mb-3">
                    <textarea name="comentario" class="form-control"   aria-describedby="button-addon2" id="comentario" cols="40" rows="1"></textarea>
                    <div class="input-group-append">
            
                        <button class="btn btn-success  enviar"   name="btnComentar" data-nombreUsuario="<?php echo $usu['Usuario']; ?>" data-idProducto="<?php echo $idProducto;?>" data-idUsuario="<?php echo $idUsuario; ?>">Enviar</button>
                    </div>    
                </div>
                <br>
                
              
            <?php

                }  
            ?> 
            <hr>
            <div name="mostrarComentarios" class="border border-dark"  id="mostrarComentarios" ></div>
            <hr>
            
            
        </div><br>
    </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    
    <script src="../../../JS/DetallesProducto.js"></script>                
    <script src="../../../JS/Catalogo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
</body>
</html>



