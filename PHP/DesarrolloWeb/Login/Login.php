<?php
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
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
    <title>Inicio de Sesión AnimeTEK</title>
    <link rel="icon" href="../../../IMG/Logo/LogoFullTransparente.ico">
    <!--Links para las fuentes de Google Fonts.-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
    <!--Link para la versión de Bootstrap.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--Links para el footer.-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- LINK ESTILOS DE LA PÁGINA CSS  -->
    <link rel="stylesheet" href="../../../CSS/Estilos.css">
    <!-- SCRIPT PARA LOADER -->
    <script src="../../../JS/Loader.js"></script>
    <!-- SCRIPT PARA SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body >
    <!--Loader.-->
    <?php include_once "../InterfazWeb/Loader.php"?>

    <!-- CABECERA ANIMETEK -->
    <?php include_once '../InterfazWeb/CabeceraAnimeTEK.php';?>


    <!-- ESTE ES EL MENÚ DE NAVEGACIÓN DE ANIMETEK  -->
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <a class="navbar-brand" href="../InterfazWeb/Home.php">
                <img src="../../../IMG/Logo/LogoFullTransparente.ico" width="40" height="40" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fuenteMenu" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="../InterfazWeb/Home.php">Home <span class="sr-only">Home</span></a>
                    <a class="nav-item nav-link " href="../InterfazWeb/Catalogo.php">Catálogo</a>
                    <a class="nav-item nav-link " href="../InterfazWeb/MasSobreAnimeTEK.php">Más sobre AnimeTEK</a>
                      
            </div>
                <!-- ESTE INCLUDE CONTINE UNA PARTE DEL MENU QUE SOLO SE MUESTRA A USUARIOS  -->
                <?php include_once '../InterfazWeb/MenuUsuarios.php';?>
        </nav>
    </div><br>
 
    <div class="container">

        <div class="row">
            <span class="col-md-3"></span>
            <div class=" col-md-6 contenedorFormulario ">
                <form action="ComprobarLogin.php" id="FormularioLogin" method="post">
                    <legend>Inicia sesión</legend>
                    <!-- USUARIO -->
                    <div class="grupo_usuario">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" required><br>
                        <p class="mensajeError-oculto" id="mError-usuario">&nbsp;¡El usuario es incorrecto!</p>
                    </div><br>
                    <!-- CONTRASEÑA -->
                    <div class="grupo_password ">  
                        <label for="password">Contraseña</label>
                            <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required><br>
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-outline-dark" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensajeError-oculto" id="mError-password">&nbsp;¡La contraseña es incorrecta!</p>
                        </div>
                    <center>
                        <div class="grupo_envio  ">
                            <input type="submit" class="btn btn-success btn-lg col-md-6" value="Enviar">
                            
                        </div>
                    </center>
                    <br>
                    
                    <div class="d-none d-sm-none d-md-block"><a href="../Registro/Registro.php">¿No tienes cuenta? Regístrate aquí.</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="RecuperarPassword.php">¿Has olvidado la contraseña?</a>    
                    </div>
                   
                    <div class="d-block d-sm-block d-md-none">
                    <a href="../Registro/Registro.php">¿No tienes cuenta? Regístrate aquí.</a><br><br>
                    <a href="RecuperarPassword.php">¿Has olvidado la contraseña?</a>
                    </div>
                    <br>
                    <br>
                    <p class="errorFormulariosBD">
                        <?php 
                            if(isset($_GET['error']) && $_GET['error'] == "ContraseñaIncorrecta"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."La contraseña que ha introducido es incorrecta.";}
                            if(isset($_GET['error']) && $_GET['error'] == "usuarioNoEncontrado"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."El usuario que ha introducido no existe.";  } 
                        ?>
                    </p>

               
   
                    <?php
                        if(isset($_GET['accion']) && $_GET['accion'] == "passwordCambiada"){ 
                        echo "<script>swal('AnimeTEK', 'La contraseña se ha cambiado correctamente.', 'success');</script>";
                        
                    }?>
                    <?php
                        if(isset($_GET['accion']) && $_GET['accion'] == "emailEnviado"){ 
                        echo "<script>swal('AnimeTEK', 'Se ha enviado un email a su correo electronico para cambiar la contraseña.', 'info');</script>";
                        
                    }?>
            
                    
                </form>
            </div>
            
        </div>
       

    </div>
    <br>
    <br>
    <br>
    <!-- ESTE INCLUDE ES EL FOOTER -->
    <?php include_once "../InterfazWeb/Footer.php"?>
     
    <!--Scripts-->   
    <script src="../../../JS/FormularioLogin.js"></script> 
    <!-- SCRIPT FONT AWSOME PARA LOS ICONOS  -->
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>