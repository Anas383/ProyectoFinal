<?php
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    require '../../BD/Config.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    // INICIAMOS SESION
    session_start();
    // RECIBIMOS EL VARIABLE POR EL METODO GET
    $idCategoria= $_GET['idCategoria'];
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo AnimeTEK</title>
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
                    <a class="nav-item nav-link active" href="Catalogo.php">Catálogo</a>
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

    <!-- VENTANA EMERGENTE INICIA SESION PARA AÑADIR AL CARRITO-->
    <div class="modal fade" id="emergenteIniciaSesionCatalogo" tabindex="-1" role="dialog" aria-labelledby="emergenteIniciaSesionCatalogo"
        aria-hidden="true">
        <div class="modal-dialog ventanaEmergente" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="emergenteIniciaSesionCatalogo">AnimeTEK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-window-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Para añadir productos a tu carrito debes iniciar sesión.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <span class="">
                        <button type="button" class="btn btn-success">
                            <a href="../Login/Login.php" style="text-decoration: none; color:white">Iniciar Sesión</a>
                        </button>
                    </span>

                </div>
            </div>
        </div>
    </div>
    <!-- CONTENEDOR PRINCIPAL --> 
    <div class="container row-md contenedor">
    
        <h1 class="titulosPrincipal" >Catálogo AnimeTEK</h1><br><br>
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
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <form action="Buscar.php" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control " type="search" name="busqueda" id="busqueda" placeholder="Buscar..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn  text-light botonBuscar"  type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    
                </form>
            </div>   
        </div><br>

                
        <!-- ESTA ES LA TARJETA QUE UTILIZAMOS PARA IMPRIMIR LOS PRODUCTOS  -->      
        <div class="row mb-5">
            
            <?php   
                // BUSCAMOS LOS PRODUCTOS CON ESA CATEGORIA 
                $resultadoConsulta =buscarUnaCategoriaCatalogo($conexion, $idCategoria);
                if(mysqli_num_rows($resultadoConsulta)!=0){
                    
                    while( $productos = mysqli_fetch_assoc($resultadoConsulta)){          
                
            ?>
            <!-- IMPRIMIMOS LOS PRODUCTOS CON ESA CATEGORIA -->
                <div class="col-sm-6 col-lg-4 mb-4 " data-aos="fade-up" >
                    <div class="block-4 tarjetasProductos">
                        <figure class="block-4-image">
                            <img  data-toggle="popover" data-trigger="hover" title="<?php echo $productos['NombreProducto']?>" data-content="<?php echo $productos['DetallesProducto'];?>" src="data:image/jpeg;base64,<?php echo base64_encode($productos['Imagen']);?>" width="100%" height="317" alt="Image placeholder" class="img-fluid">
                        </figure>
                        <div class="block-4-text p-4">
                            <h3 style=" font-size: 90%;"><?php echo $productos['NombreProducto']?></h3>
                            <span class="text-danger"><?php if($productos['Stock']==0){echo '¡Producto agotado!'.'<i class="far fa-frown"></i>'; }?></span><br>
                            <strong>Stock: <?php echo $productos['Stock'];?></strong><br>
                            <strong>Precio: <?php echo $productos['Precio'];?>&nbsp;€ </strong>
                                        
                                <div class="row">
                                    <div class="m-auto"><br>
                                        <a class="btn btn-danger mt-1" href="DetallesProducto.php?idProducto=<?php echo $productos['idProducto']; ?>">Ver detalles</a> 
                                        <?php

                                            if($_SESSION['usuarioConectado']==false){

                                        ?> 
                                        <!-- ESTE ES EL BOTON DE AÑADIR PRODUCTO CUANDO EL USUARIO NO HA INICIADO SESION, EL CUAL TIENE LOS ATRIBUTOS DE BOOTSTRAP
                                        PARA MOSTRAR UN MODAL Y ADVERTIR AL USUARIO DE QUE TIENE QUE INICIAR SESION PARA PODER AÑADIR PRODUCTOS  --> 
                                        <button class="btn btn-success mt-1" type="button"  data-toggle="modal" data-target="#emergenteIniciaSesionCatalogo" >Añadir al carrito</button> 
                                        <?php    
                                            }elseif($_SESSION['usuarioConectado']==true){
                                
                                        ?>
                                        <!-- ESTE ES EL BOTON DE AÑADIR PRODUCTO CUANDO EL USUARIO HA INICIADO SESION -->
                                        <button class="btn btn-success mt-1 enviar"   name="btnAccion" <?php if($productos['Stock']==0){echo 'data-toggle="modal" data-target="#productoSinStock"'; }?> 
                                        data-stock="<?php echo $productos['Stock'];?>" data-id="<?php echo $productos['idProducto'];?>" data-precio="<?php echo $productos['Precio']; ?>"  data-cantidad="<?php echo $productos['Cantidad']; ?>">Añadir al carrito</button>
                                        <?php
                                            }
                                        ?> 
                                    </div>
                            
                                </div>   
                        </div> 
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>                    
        </div>      
        <!-- EMERGENTE PARA LOS PRODUCTOS SIN STOCK      -->
        <div class="modal fade" id="productoSinStock" tabindex="-1" aria-labelledby="productoSinStockLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productoSinStockLabel">AnimeTEK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        El producto está agotado.
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                
                        </div>
                    </div>
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