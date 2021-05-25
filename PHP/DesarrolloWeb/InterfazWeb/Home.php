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
                  <a class="nav-item nav-link  active" href="Home.php">Home <span class="sr-only">Home</span></a>
                  <a class="nav-item nav-link " href="Catalogo.php">Catálogo</a>
                  <a class="nav-item nav-link " href="MasSobreAnimeTEK.php">Más sobre AnimeTEK</a>
                  <?php include_once 'MenuAdministradores.php'?>
                      
                </div>
                
            <?php include_once 'MenuUsuarios.php';?>
        </nav>
        
    </div><br>

    <?php include_once 'VentanaEmergenteLogOut.php';?>
  <!-- VENTANA EMERGENTE PARA LOS USUARIOS REGISTRADOS -->
    <p>
        <?php
            if(isset($_GET['registrado']) && $_GET['registrado'] == "usuarioRegistrado"){ echo '
                <div class="modal" id="usuarioSeRegistro" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">AnimeTEK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¡ Te has registrado correctamente!
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
  
  
    <div class="container">
        <div class="contenedor">
           
            <div class="row">
                
                <span class="col-md-3">
                    <h2 class="titulosPrincipal " >CATEGORIAS</h2>
                   <br>
                   <br>

                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Categorias</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                      </ul>
                </span>
                <section class="col-md-6">
                    <h1 class="titulosPrincipal text-center">PRODUCTOS</h1>
                    <div class="dropdown-divider "></div><br>
                    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="../../../IMG/Productos/TazaGoku.jpg " width="100%"   height="350vh" class="d-block w-100 rounded" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="../../../IMG/Productos/figuraGoku.jpg"  width="100%"   height="350vh" class="d-block w-100 rounded" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="../../../IMG/Productos/figuraBroly.jpg"  width="100%"   height="350vh" class="d-block w-100 rounded" alt="...">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                      
                </section>
                <span class="col-md-3">
                    <h2 class="titulosPrincipal">Recomendados</h2><br><br>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="card" style="width: 100%;">
                                <img src="../../../IMG/Productos/figuraBroly.jpg" width="100%" height="200vh" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../../../IMG/Productos/figuraGoku.jpg" width="100%" height="200vh" class="d-block w-100" alt="...">
                            <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                          </div>
                          <div class="carousel-item">
                            <img src="../../../IMG/Productos/TazaGoku.jpg" width="100%" height="200vh" class="d-block w-100" alt="...">
                            <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                          </div>
                        </div>
                      </div>
                </span>
             </div>
    
  </div>
</div>
        </div><br>
    </div>
    <br>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    
   
    <script src="../../../JS/Home.js"></script> 
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>$('#usuarioSeRegistro').modal('show');</script>
    <?php
      if($_SESSION['usuarioConectado']==true){
        echo ' <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>';
      }
    
    ?>
    <script src="../../../JS/Catalogo.js"></script> 
</body>
</html>

