<?php
    //INICIAMOS SESION
    session_start();
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    require '../../BD/Config.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
   
?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito AnimeTEK</title>
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
    <!-- LINK ESTILOS DE LA PÁGINA CSS -->
    <link rel="stylesheet" href="../../../CSS/Estilos.css">
    <!-- LINK NORMALIZE -->
    <link rel="stylesheet" href="../../../CSS/Normalize.css">
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
    <!-- VENTANA EMERGENTE PARA EL LOGOUT -->
    <?php include_once 'VentanaEmergenteLogOut.php';?>
    <!-- CONTENEDOR PRINCIPAL -->
    <div class="container">
        
        <div class="table-responsive">
            <table class="table bg-light rounded  text-center">
                
                <thead class="bg-danger   ">
                <tr>
                <th scope="col">Producto</th>
                    <th scope="col">Precio del Producto</th>
                    <th scope="col">Cantidad</th>
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
                        <td><a href="SumarCantidadProductoCarrtio.php?idItem=<?php echo $productosCarrito['idItem'];?>&idProducto=<?php echo $productosCarrito['idProductoCarrito'];?>" class="btn btn-success" style="font-size: 10px; color: white;"><i class="fas fa-plus"></i></a>&nbsp;<?php echo $productosCarrito['Cantidad'];?>ud. &nbsp; <a href="RestarCantidadProductoCarrtio.php?idItem=<?php echo $productosCarrito['idItem'];?>&cantidad=<?php echo $productosCarrito['Cantidad'];?>" class="btn btn-danger" style="font-size: 10px; color: white;"><i class="fas fa-minus"></i></a></td>
                        <td class="botonesTablasEdicion"><button class="btn btn-primary detalles" name="detalles" data-nombre="<?php echo $nombreProductoCarrito['NombreProducto'];?>"><i class="fas fa-info-circle"></i></i>&nbsp;&nbsp;Detalles</button><a href="EliminarProductoCarrito.php?idItem=<?php echo $productosCarrito['idItem'];?>"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></i>&nbsp;&nbsp;Eliminar</a></td>

                        <?php
                        }
                        ?>
                    </tr>
                    <tr class="bg-info">
                        <td style="font-size: 1.7rem;">Precio Total:</td>
                        
                        <td style="font-size: 1.7rem;">
                        <?php 
                        
                        $precioTotalProductos= totalPrecioProductosCarrito($conexion, $idCesta);
                        $precioTotal=mysqli_fetch_assoc($precioTotalProductos);
                        $total=$precioTotal['SUM(PrecioProducto*Cantidad)'];
                        if($total==NULL){
                            $total='0.00';
                            }
                        $insertarPrecioTotalEnCarrito= insertarPrecioTotalTablaCarrito($conexion,$idCesta, $total);
                        echo $total;
                        ?>€</h4>
                        
                        </td>
                        <?php include_once 'VentanaEmergenteDireccionAlPagar.php'?>
                        <td><?php if($total==0.00){
                            echo'<a href="Catalogo.php" class="btn btn-warning btn-lg">Ir a catálogo</a>';
                        }else{?>
                            
                            <a href="#" data-toggle="modal" data-target="#emergenteDireccionesAlPagar"  class="btn btn-success btn-lg">Realizar pago <strong>> ></strong></a>
                        <?php


                        } ?></td>
                        <td><a href="VaciarCarrito.php" id="vaciarCarrito"  class="btn btn-danger btn-lg">Vaciar carrito</a></td>
                        
                    </tr>
                
                </tbody>
            </table>
        </div>
      </div>
      <p>
        <?php
            if(isset($_GET['stock']) && $_GET['stock'] == "limiteStockAlcanzado"){ 
                echo '
                <div class="modal" id="limiteStockAlcanzado" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">AnimeTEK</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Ya no hay más stock de este producto.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            
                            </div>
                        </div>
                    </div>
                </div>
                ';}
        ?>
    </p>
    <br>
      <!-- ESTE INCLUDE ES EL FOOTER -->
    <?php include_once "Footer.php"?>
    
    <!--Scripts-->
    <!-- SCRIPT BOOTSTRAP PARA MOSTRAR LA VENTANA EMERGENTE LIMITE ALCANZADO  -->
    <script>$('#limiteStockAlcanzado').modal('show');</script>
    <script src="../../../JS/ValidarDirecciones.js"></script>    
    <!-- SCRIPT FONT AWSOME PARA LOS ICONOS  -->
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <!-- SCRIPT DE BOOTSTRAP  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- SCRIPT NECESARIO PARA JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>               
    <script src="../../../JS/Catalogo.js"></script>
    <!-- SCRIPT SWEETALERT  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    // CUANDO CARGUE LA PAGINA
        $(document).ready(function(){
            // AL HACER CLICK EN EL BOTON DETALLES
            $("button[name=detalles]").on("click", function(){
                // MUESTRA UN SWEETALERT CON ALGUNOS DETALLES DEL PRODUCTO
                swal("Detalles del producto","Nombre: <?php echo  $nombreProductoCarrito['NombreProducto'];?>
                    \nPrecio: <?php echo $nombreProductoCarrito['Precio'];?>
                    \nStock: <?php echo $nombreProductoCarrito['Stock'];?>","info" 
                );
            })
        })
    </script>
   
</body>
</html>