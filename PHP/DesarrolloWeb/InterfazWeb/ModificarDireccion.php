<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}

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
    <title>Administrar Direcciones AnimeTEK</title>
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
    <?php include_once 'CabeceraAnimeTEK.php';?>


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
            <span class="col-md-3"></span>
            <div class=" col-md-6 contenedorFormulario ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">Home</li>
                        <li class="breadcrumb-item active " aria-current="page">Administración de Direcciones</li>
                        <li class="breadcrumb-item " aria-current="page">Modificar Direccion</li>
                    </ol>
                </nav>
                <form action="GuardarModificacionesDomicilio.php" id="formularioDirecciones" method="post">
                    <legend>Modificar Dirección.</legend>
                    <div class="row">
                                <?php 
                                
                                $idUsuario=$_GET['idUsuario'];
                                $consultarDomicilio=BuscarUsuarioDomicilio($conexion,$idUsuario);
                                $domicilio= mysqli_fetch_assoc($consultarDomicilio);
                                
                                ?>
                                <div class=" grupo_cp form-group col-md-6">
                                    <label for="cp">Código Postal</label>
                                    <input type="text" name="cp" class="form-control" id="cp" value="<?php echo $domicilio['CP'] ?>" required>
                                <p class="mensajeError-oculto" id="mError-cp">¡Código Postal incorrecta!</p>
                                </div>
                            
                                <div class=" grupo_provincia form-group col-md-6">
                                    <label for="provincia">Provincia</label>
                                    <input type="text" name="provincia" class="form-control" id="provincia" value="<?php echo $domicilio['Provincia'] ?>" required>
                                <p class="mensajeError-oculto" id="mError-provincia">¡Provincia incorrecta!</p>
                                </div>
                                <div class="grupo_comunidadAutonoma form-group col-md-6">
                                    <label for="comunidadAutonoma">Comunidad Autónoma</label>
                                    <input type="text" name="comunidadAutonoma" class="form-control" id="comunidadAutonoma" value="<?php echo $domicilio['ComunidadAutonoma'] ?>"required>
                                <p class="mensajeError-oculto" id="mError-comunidadAutonoma">¡Comunidad Autónoma incorrecta!</p>
                                </div>
                                <div class="grupo_calle form-group col-md-6">
                                    <label for="calle">Calle</label>
                                    <input type="text" name="calle" class="form-control" id="calle" value="<?php echo $domicilio['Calle'] ?>" required>
                                <p class="mensajeError-oculto" id="mError-calle">¡Calle incorrecta!</p>
                                </div>
                                <div class="grupo_numero form-group col-md-6">
                                        <label for="numero">Número</label>
                                        <input type="number" name="numero" class="form-control"  value="<?php echo $domicilio['Numero'] ?>" id="numero" required>
                                    <p class="mensajeError-oculto" id="mError-numero">¡Número incorrecta!</p>
                                </div>
                            
                                <div class="grupo_piso form-group col-md-6">
                                        <label for="piso">Piso</label>
                                        <input type="text" name="piso" class="form-control"  value="<?php echo $domicilio['Piso'] ?>" id="piso">
                                    <p class="mensajeError-oculto" id="mError-piso">¡Piso incorrecta!</p>
                                </div>
                                
                                <div class="grupo_portal form-group col-md-12">
                                        <label for="portal">Portal</label>
                                        <input type="text" name="portal" class="form-control"  value="<?php echo $domicilio['Portal'] ?>" id="portal">
                                    <p class="mensajeError-oculto" id="mError-portal">¡Portal incorrecta!</p>
                                </div>
                            </div>
                            <input type="hidden" name="idUsuarioCF" value="<?php echo $domicilio['idUsuarioCF'] ?>">
                                                    
                        <div class="grupo_envio col-md-12 ">
                            <input type="submit" class="btn btn-success btn-lg col-md-12" value="Enviar">
                        </div>
                    
                    </div>
                </form> 

            </div>
            <span class="col-md-3"></span>
        </div> 
           
    </div>
    <?php include_once "Footer.php"?>
    
    <!--Scripts--> 
    <script src="../../../JS/ValidarDirecciones.js"></script>  
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>               
    <script src="../../../JS/Catalogo.js"></script>
</body>
</html>