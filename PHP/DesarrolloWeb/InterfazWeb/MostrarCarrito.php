<?php
    session_start();
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    require '../../BD/Config.php';
    $conexion=conectar(true);
   
    

?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home AnimeTEK</title>
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
        <link rel="stylesheet" href="../../../CSS/Normalize.css">
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
        
    <div class="table-responsive">
        <table class="table bg-light rounded  text-center">
            
            <thead class="bg-danger   ">
              <tr>
              <th scope="col">Producto</th>
                <th scope="col">Precio del Producto</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <?php 
                $idCesta=$_SESSION['idUsuario'];
                $listarProductosCarrito=  listarProductosCarrito($conexion,$idCesta); 
                while($productosCarrito=mysqli_fetch_assoc($listarProductosCarrito)){
            ?>
            <tbody  >
                    
                <tr >
                    
                    <td><?php
                    $idProductoCarritoNombre=$productosCarrito['idProductoCarrito'];
                    $buscarNombreProducto=buscarNombreProductosCarrito($conexion,$idProductoCarritoNombre);
                    $nombreProductoCarrito=mysqli_fetch_assoc($buscarNombreProducto);
                    ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($nombreProductoCarrito['Imagen']);?>" class="img-responsive  " align="left" width="70vh" height="70vh" alt=""style="border-radius: 5rem; " >
                    <?php
                    
                    echo $nombreProductoCarrito['NombreProducto'];
                    ?>
                   </td>
                  
                    <td><?php echo $productosCarrito['PrecioProducto'];?>€</td>
                    <td class="botonesTablasEdicion"><a href="#" class="btn btn-primary "><i class="fas fa-info-circle"></i></i>&nbsp;&nbsp;Detalles</a><a href="#" data-toggle="modal" data-target="#emergenteEliminarProducto"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></i>&nbsp;&nbsp;Eliminar</a></td>
                    <?php include_once 'EmergenteEliminarProductoCarrito.php'?>
                    <?php
                     }
                    ?>
                </tr>
                <tr class="bg-info">
                     <td style="font-size: 1.7rem;">Precio Total:
                     <?php 
                       
                       $precioTotalProductos= totalPrecioProductosCarrito($conexion, $idCesta);
                       $precioTotal=mysqli_fetch_assoc($precioTotalProductos);
                       $total=$precioTotal['SUM(PrecioProducto)'];
                       if($total==NULL){
                           $total='0.00';
                        }
                       $insertarPrecioTotalEnCarrito= insertarPrecioTotalTablaCarrito($conexion,$idCesta, $total);
                       echo $total;
                     ?>€</h4></td>
                     <td>
                        
                    <a href="Pagar.php?precioTotal=<?php echo $total;?>" class="btn btn-warning btn-lg">Realizar pago <strong>> ></strong></a>
                    </td>
                    <td><a href="EmergenteVaciarCarrito.php" data-toggle="modal" data-target="#emergenteVaciarCarrito"  class="btn btn-danger btn-lg">Vaciar carrito</a></td>
                     
                </tr>
               
            </tbody>
        </table>
       </div>
      </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    
    <script src="../../../JS/Catalogo.js"></script>  
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>