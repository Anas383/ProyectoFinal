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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
       
        <script src="../../../JS/Loader.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      

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
            <p style="text-align: center; "><img src="data:image/jpeg;base64,<?php echo base64_encode($producto['Imagen']);?>" class="img-responsive border border-dark rounded " width="300rem"  height="300rem" alt="" ></p><br>
            <hr>
            <?php
                $mostrarValoracion= mostrarValoracion($conexion, $idProducto, $idUsuario);
                $valoracion=mysqli_fetch_assoc($mostrarValoracion);
                $numero=$valoracion['Valoracion'];
            ?>
            <?php

            if($_SESSION['usuarioConectado']==false){

            ?> 
            <?php    
            }elseif($_SESSION['usuarioConectado']==true){

            ?>
           
            <p>Calificación: <div id="rateYo" data-rateyo-rating="<?php 
                if($numero==0){
                    echo '0';
                }else{
                    echo $valoracion['Valoracion'];
                }
            
            ?>"></div></p>
            <span class="row">
            <?php
                $media=mysqli_fetch_assoc(hacerMediaValoracion($conexion,$idProducto));
                $porcentajeMedia=($media['format(AVG(Valoracion),1)']*100)/5;
                insertarValoracionMedia($conexion, $idProducto, $media['format(AVG(Valoracion),1)']);
                    
                ?>
                <div class="col-md-5">Calificación Media del producto:  </div>
                <div class="col-md-2 "><?php if($media['format(AVG(Valoracion),1)']==NULL){echo "0.0";}else{echo $media['format(AVG(Valoracion),1)'];}?> <i class="fas fa-star text-warning"></i></div>
                <div class="col-md-5 mt-2">
                <div class="progress ">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $porcentajeMedia;?>%" aria-valuenow="<?php echo $porcentajeMedia;?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                    
                </div>
            </span>

            <hr>
            <?php

            }  
            ?>
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
                <button class="btn btn-success mt-1 enviar col-md-4" style=" font-family: 'Fredoka One', cursive;"  type="button"  data-toggle="modal" data-target="#emergenteIniciaSesionCatalogo" >Añadir al carrito</button> 
                <div class="col-md-4"></div>
            </div>
            
            <?php    
                }elseif($_SESSION['usuarioConectado']==true){

            ?>  
            <div class="row ">
                <div class="col-md-4"></div>
                <button class="btn btn-success mt-1 enviar col-md-4" style=" font-family: 'Fredoka One', cursive;"   name="btnAccion" <?php if($producto['Stock']==0){echo 'data-toggle="modal" data-target="#productoSinStock"'; }?> 
                data-stock="<?php echo $producto['Stock'];?>" data-id="<?php echo $producto['idProducto'];?>" data-precio="<?php echo $producto['Precio']; ?>"  data-cantidad="<?php echo $producto['Cantidad']; ?>">Añadir al carrito</button>
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
            <form id="form-comentarios">   
                <div class="input-group mb-3">
                    
                    <textarea name="comentario" class="form-control" placeholder="Escribe tu comentario..."  aria-describedby="button-addon2" id="comentario" cols="40" rows="1"></textarea>
                    <div class="input-group-append">
            
                        <button class="btn btn-success  enviar"   name="btnComentar" data-rol="<?php echo $_SESSION['ROL']; ?>" data-idProducto="<?php echo $idProducto;?>" data-idUsuario="<?php echo $idUsuario; ?>">Enviar</button>
                    </div> 
                    
                    </form>   
                </div>
                <br>
                <label for="desplegarComentarios" class="input-group-text" style="cursor: pointer;"><i class="fas fa-sort-down flechaArriba" style="font-size:1.25rem;"></i>&nbsp;<b>Mostrar comentarios <i class="fas fa-comments"></i></b></label>
                <input type="checkbox" name="desplegarComentarios" id="desplegarComentarios" style="display: none;">
                <hr>
                <div name="mostrarComentarios" class="border border-dark"  id="mostrarComentarios" style="display: none;" ></div>
                <hr>
            <?php

                }  
            ?> 
            
            
        </div><br>
    </div>
    <!-- VENTANA EMERGENTE  -->
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
                        El Producto está agotado.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    
    <script src="../../../JS/DetallesProducto.js"></script>                
    <script src="../../../JS/Catalogo.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="../../../JS/Estrellas.js"></script>
</body>
</html>
<script>
    
            $(document).ready(function()
            {
                $("#desplegarComentarios").click(function(evento)
                {
                    if($("#desplegarComentarios").is(":checked"))
                    {
                        $("#mostrarComentarios").css("display", "block");
                        $('.flechaArriba').removeClass('fas fa-sort-down').addClass('fas fa-sort-up');
                    }
                    else
                    {
                        $("#mostrarComentarios").css("display", "none");
                        $('.flechaArriba').removeClass('fas fa-sort-up').addClass('fas fa-sort-down');
                    }
                });
            });
</script>



