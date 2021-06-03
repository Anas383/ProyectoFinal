<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    //INICIAMOS SESION 
    session_start();
?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Categorias AnimeTEK</title>
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
    <!-- SCRIPT PARA LOADER -->
    <script src="../../../JS/Loader.js"></script>
        

</head>
<body >
    <!--Loader.-->
    <?php include_once "Loader.php"?>


    <!-- CABECERA  ANIMETEK -->
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
        
        <div class="row">
            <span class="col-md-3"></span>
            <!--ESTAS SON LAS  MIGAS DE PAN -->
            <div class=" col-md-6 contenedorFormulario ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">Home</li>
                    <li class="breadcrumb-item active " aria-current="page">Administración de Categorías</li>
                    <li class="breadcrumb-item " aria-current="page">Insertar Categoría</li>
                </ol>
            </nav>
                <form action="GuardarInsercionCategoria.php" method="post" id="FormCategorias" enctype="multipart/form-data">
                        <legend>Añadir nueva categoría</legend>  
                        <!-- NOMBRE-->
                        <div class="grupo_nombre col-md-12  ">
                            <label for="nombre"><strong>Nombre de la categoría</strong></label>
                            <input type="text" name="nombre"  id="nombre" class="form-control" required >
                            <br>
                            <p class="mensajeError-oculto" id="mError-nombre">&nbsp;¡La categoría debe tener un nombre!</p>
                        </div><br>
                        <div class="grupo_descripcion form-group col-md-12">
                                <label for="descripcion">Descripción de la categoría</label>
                                <textarea class="form-control" id="descripcion" rows="3" name="descripcion" minlength="0" maxlength="10000"  required></textarea>
                                <p><span id="caracteres"></span></p>
                        </div>

                        <!-- logo -->
                        <div class="form-group grupo_logo col-md-12 " >
                            <label for="logo">Logo de la  categoría</label><br>
                            <input type="file"  name="logo" id="logo" required>
                        </div><br>

                       <div class="grupo_envio ">
                            <input type="submit" class="btn btn-success btn-lg col-md-12" value="Crear">
                        </div><br>
                        <p class="errorFormulariosBD"><?php 
                                if(isset($_GET['error']) && $_GET['error'] == "nombreExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."Esta categoria ya existe";}
                                if(isset($_GET['categoria']) && $_GET['categoria'] == "nombreExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."Esta categoria ya existe";}
                            ?>
                            
                        </p>             
                        
                        </div>
    
                </form>

            </div>
            <span class="col-md-3"></span>
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
    <script src="../../../JS/FormCategorias.js"></script>
</body>
</html>