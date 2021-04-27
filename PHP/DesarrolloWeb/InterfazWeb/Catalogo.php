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
                    <a class="nav-item nav-link active" href="Catalogo.php">Catálogo</a>
                    <a class="nav-item nav-link " href="MasSobreAnimeTEK.php">Más sobre AnimeTEK</a>
                   <?php include_once 'MenuAdministradores.php'?>
                      
                </div>
                
            <?php include_once 'MenuUsuarios.php';?>
        </nav>
        
    </div><br>

    <?php include_once 'VentanaEmergenteLogOut.php';?>
  
    <div class="container row-md contenedor">
    
    <h1>PRODUCTOS AnimeTEK</h1><br>
            <div class="row">
        
                <div class="col-md-3">
                    
                <div class="dropdown">
                    <a class="btn btn-lg text-light  dropdown-toggle" style=" background-color: #212237;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Filtrar  <i class="fas fa-filter"></i> &nbsp;&nbsp; &nbsp; &nbsp;
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="Catalogo.php">Todas</a>
                        <?php 
                            $resultadoConsultaCategorias = buscarCategoriasCatalogo($conexion);
                            if(mysqli_num_rows($resultadoConsultaCategorias)!=0){
                                
                                while( $categorias = mysqli_fetch_assoc($resultadoConsultaCategorias)){ 
                        
                        ?>
                        <a class="dropdown-item" href="Filtrar.php?idCategoria=<?php echo $categorias['idCategoria'];?>"><?php echo $categorias['NombreCategoria']?></a>
                        <?php
                                }
                            }
                        
                        ?>
                    </div>
                </div>                            
                </div>
                <div class="col-md-5">
                  
                </div>
                <div class="col-md-4">
                    <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control " type="search" placeholder="Buscar..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn  text-light botonBuscar"  type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    
                   
                    </form>
                </div>
                
           
            </div><br>
            <p>
                <?php
                    if(isset($_GET['sesionNoIniciadaC']) && $_GET['sesionNoIniciadaC'] == "sesionCarritoNoIniciada"){ echo '
                        <div class="modal" id="inicioCarrito" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">AnimeTEK</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                Para añadir productos a tu carrito inicia sesión.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <a href="../Login/Login.php" class="btn btn-success"> Iniciar sesión</a>
                                
                                </div>
                                </div>
                            </div>
                        </div>';}
                ?>
            </p>
            <div class="row mb-5">
            
                <?php    
                    $resultadoConsulta = buscarProductosCatalogo($conexion);
                    if(mysqli_num_rows($resultadoConsulta)!=0){
                        
                        while( $productos = mysqli_fetch_assoc($resultadoConsulta)){          
                        
                ?>
                <div class="col-sm-6 col-lg-4 mb-4 " data-aos="fade-up" >
                    <div class="block-4 tarjetasProductos">
                        <figure class="block-4-image">
                            <img  data-toggle="popover" data-trigger="hover" title="<?php echo $productos['NombreProducto']?>" data-content="<?php echo $productos['DetallesProducto'];?>" src="data:image/jpeg;base64,<?php echo base64_encode($productos['Imagen']);?>" width="100%" height="317" alt="Image placeholder" class="img-fluid">
                        </figure>
                        <div class="block-4-text p-4">
                            <h3 style=" font-size: 90%;"><?php echo $productos['NombreProducto']?></h3><br>
                           <strong> <?php echo $productos['Precio'];?>&nbsp;€ </strong>                           
                            <form action="Carrito.php" method="post">
                                <input type="text" name="idProducto" id="idProducto" value="<?php echo $productos['idProducto']; ?>">
                                <input type="text" name="precioProducto" id="precioProducto" value="<?php echo $productos['Precio']; ?>">
                                <input type="text" name="cantidadProducto" id="cantidadProducto" value="<?php echo '1'; ?>">
                                <input type="text" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
                                <div class="row">
                                    <div class="m-auto"><br>
                                        <a class="btn btn-danger mt-1" href="">Ver detalles</a> 
                                         
                                        <button class="btn btn-success mt-1" name="btnAccion" value="Agregar" data-toggle="modal" data-target="#inicioCarrito" type="submit">Añadir al carrito</button>
                                    </div>
                            
                                </div>
                            
                            </form>
                            
                        </div> 
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>                    
        </div>      
               
    
    </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    <script>
        $(function () {
    $('[data-toggle="popover"]').popover()
    })
    </script>
    <script src="../../../JS/Catalogo.js"></script>  
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>