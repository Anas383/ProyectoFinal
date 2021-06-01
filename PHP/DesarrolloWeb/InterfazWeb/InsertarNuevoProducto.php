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
    <title>Administrar Productos AnimeTEK</title>
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
        
        <div class="row">
            <span class="col-md-3"></span>
            <div class=" col-md-6 contenedorFormulario ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">Home</li>
                        <li class="breadcrumb-item active " aria-current="page">Administración de Productos</li>
                        <li class="breadcrumb-item " aria-current="page">Añadir nuevo Producto</li>
                    </ol>
                </nav>
                <form action="ComprobarAñadirNuevoProducto.php" id="FormularioAñadirProductos" method="post" enctype="multipart/form-data">
                    <legend>Añadir nuevo producto</legend>  
                        <!-- NOMBRE-->
                        <div class="grupo_nombre col-md-12  ">
                            <label for="nombre"><strong>Nombre del producto</strong></label>
                            <input type="text" name="nombre"  id="nombre" class="form-control" required >
                            <br>
                            <p class="mensajeError-oculto" id="mError-nombre">&nbsp;¡El producto tiene que tener un nombre!</p>
                        </div><br>

                        <div class="grupo_categorias  col-md-12 ">
                         
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="categorias">Categorías</label>
                                </div>
                                <select class="custom-select" name="categorias" id="categorias" required>
                                  <option  value="" >Elige una categoría</option>
                                  <?php 
                                    $listarCategorias= listarCategorias($conexion);
                                    while( $categorias = mysqli_fetch_assoc($listarCategorias)){ 
                                  
                                  ?>
                                  <option value="<?php echo $categorias['idCategoria'];?>"><?php echo $categorias['NombreCategoria'] ?></option>
                                  <?php
                                    }
                                ?>
                                </select>
                              </div>
                        </div>

                        <div class="grupo_descripcion form-group col-md-12">
                            <label for="descripcion">Descripción del producto</label>
                            <textarea class="form-control" id="descripcion" rows="3" name="descripcion" minlength="1" maxlength="10000" required></textarea>
                            <p><span id="caracteres"></span></p>
                        </div>

                        <div class="grupo_precio col-md-12  ">
                            <label for="precio"><strong>Precio del producto</strong></label>
                            <input type="number" name="precio" step=".01" placeholder="00.00"  id="precio" class="form-control" required >
                            <br>
                            <p class="mensajeError-oculto" id="mError-precio">&nbsp;¡El precio no cumple el formato!</p>
                        </div><br>
                        <div class="grupo_stock col-md-12  ">
                            <label for="stock"><strong>Stock del producto</strong></label>
                            <input type="number"  min="1" name="stock"   id="stock" class="form-control" required >
                            
                        </div><br>
                        <!-- imagen -->
                        <div class="form-group grupo_imagen col-md-12 " >
                            <label for="imagen">Imagen del producto</label><br>
                            <input type="file"  name="imagen" id="imagen" required>
                        </div><br>

                       <div class="grupo_envio ">
                            <input type="submit" class="btn btn-success btn-lg col-md-12" value="Enviar">
                        </div><br>
                        <p class="errorFormulariosBD"><?php 
                                if(isset($_GET['error']) && $_GET['error'] == "nombreExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."El nombre de este producto ya existe.";}
                            ?>
                            
                        </p>
                       
                        
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
    <script src="../../../JS/FormInsertarProducto.js"></script>
</body>
</html>