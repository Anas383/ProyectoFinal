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
    require '../../BD/Config.php';
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
    <title>Eliminar Usuario AnimeTEK</title>
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
     <!-- VENTANA EMERGENTE LOGOUT -->
    <?php include_once 'VentanaEmergenteLogOut.php';?>
    <!-- CONTENEDOR PRINCIPAL -->      
    <div class="container">
        <div class="contenedorPerfil">
            <!--ESTAS SON LAS  MIGAS DE PAN -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">Home</li>
                    <li class="breadcrumb-item active " aria-current="page">Administración de Usuarios</li>
                    <li class="breadcrumb-item " aria-current="page">Eliminar de Usuario</li>
                </ol>
            </nav>
           
            <?php 
                // RECOGEMOS EL ID DEL USUARIO
                $idUsuario= $_GET['idUsuario'];
                // BUSCAMOS AL USUARIO
                $buscarUsuario=consultaBuscarUsuarioID($conexion,$idUsuario);
                $usuario=mysqli_fetch_assoc($buscarUsuario);
            
            ?>
            <!-- IMPRIMIMOS LOS DATOS DEL USUARIO -->
             <h2>¿Estás seguro de eliminar a <?php echo $usuario['Usuario'];?>?</h2><br><br>
             <h2>Foto de perfil </h2>
             <img src="data:image/jpeg;base64,<?php echo base64_encode($usuario['FotoPerfil']);?>" class="img-responsive fotoPerfil" width="120vh" height="120vh" alt=""style="" > 
            <h2>Datos personales </h2><br>
            <span><b>Usuario:</b>&nbsp;&nbsp;<?php echo $usuario['Usuario'];?></span><br><br>
            <span><b>Nombre:</b>&nbsp;&nbsp;<?php echo $usuario['Nombre'];?></span><br><br>
            <span><b>Primer Apellido:</b>&nbsp;&nbsp;<?php echo $usuario['PrimerApellido'];?></span><br><br>
            <span><b>Segundo Apellido:</b>&nbsp;&nbsp;<?php echo $usuario['SegundoApellido'];?></span><br><br>
            <span><b>Teléfono:</b>&nbsp;&nbsp;<?php echo $usuario['Telefono'];?></span><br><br>
            <span><b>Correo electrónico:</b>&nbsp;&nbsp;<div><?php echo $usuario['Email'];?></div></span><br>
            <span><b>DNI: </b>&nbsp;&nbsp;<?php echo $usuario['DNI'];?></span><br><br>    
            <!-- BOTONES PARA ELIMINAR Y CANCELAR -->
            <div class="row">
               <a href="EliminarCarrito.php?idUsuario=<?php echo $usuario['idUsuario'];?>" class="btn btn-success btn-lg col-md-5 ">Confirmar</a>
               <div class="col-md-2"></div>
               <a href="AdministrarUsuarios.php" class="btn btn-danger btn-lg col-md-5">Cancelar</a>
                
            </div>
           
            
        </div><br>
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