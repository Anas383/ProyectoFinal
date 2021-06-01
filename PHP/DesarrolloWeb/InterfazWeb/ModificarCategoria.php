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
    $idCategoria=$_GET['idCategoria'];
    $buscarCategoria=buscarCategoriaPorID($conexion, $idCategoria);
    $categoria=mysqli_fetch_assoc($buscarCategoria);

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
 
    <div class="container">
        
        <div class="row">
            <span class="col-md-3"></span>
            <div class=" col-md-6 contenedorFormulario ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">Home</li>
                    <li class="breadcrumb-item active " aria-current="page">Administración de Categorías</li>
                    <li class="breadcrumb-item " aria-current="page">Modificar Categoría</li>
                </ol>
            </nav>
                <form action="GuardarModificacionesCategoria.php?idCategoria=<?php echo $categoria['idCategoria'];?>" id="FormCategorias" method="post" enctype="multipart/form-data">
                    <legend>Modificar categoría:<br><?php echo $categoria['NombreCategoria'];?></legend>  
                        <!-- NOMBRE-->
                        <div class="grupo_nombre col-md-12  ">
                            <label for="nombre"><strong>Nombre de la categoría</strong></label>
                            <input type="text" name="nombre"  id="nombre" class="form-control" value="<?php echo $categoria['NombreCategoria'];?>" >
                            <br>
                            <p class="mensajeError-oculto" id="mError-nombre">&nbsp;¡La categoría debe tener un nombre!</p>
                        </div><br>
                        <div class="grupo_descripcion form-group col-md-12">
                                <label for="descripcion">Descripción de la categoría</label>
                                <textarea class="form-control" id="descripcion" rows="3" name="descripcion" minlength="0" maxlength="10000"><?php echo $categoria['DescripcionCategoria'];?></textarea>  
                        </div>

                        <!-- logo -->
                        <div class="form-group grupo_logo col-md-12 " >
                            <label for="logo">Logo de la  categoría</label><br>
                            <input type="file"  name="logo" id="logo"">
                        </div><br>

                       <div class="grupo_envio ">
                            <input type="submit" class="btn btn-success btn-lg col-md-12" value="Guardar">
                        </div><br>
                                  
                    </div>
    
                </form>

            </div>
            <span class="col-md-3"></span>
        </div> 
           


       
        
    </div>
    <br>
    <?php include_once "Footer.php"?>
   
    <!--Scripts-->  
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>               
    <script src="../../../JS/Catalogo.js"></script>
    <script src="../../../JS/FormCategorias.js"></script>
</body>
</html>