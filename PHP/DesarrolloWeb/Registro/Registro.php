<?php

    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    $conexion=conectar(true);
    session_start();
?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístro AnimeTEK</title>
    <link rel="icon" href="../../../IMG/Logo/LogoFullTransparente.ico">
     <!--Links para las fuentes de Google Fonts.-->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
        <!--Link para la versión de Bootstrap.-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!--Links para el footer.-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../../../CSS/Estilos.css">
        <script src="../../../JS/Loader.js"></script>
        
         
      
</head>
<body >
     <!--Loader.-->
     <?php include_once "../InterfazWeb/Loader.php"?>
    <!-- CABECERA PARA HOME ANIMETEK -->
    <header class="cabecera d-none d-sm-none d-md-block">
        <center>
            <img src="../../../IMG/Anime.png"alt="" srcset=""><img src="../../../IMG/TEK.png" width="200px" height="150px" alt="" srcset="">
        </center>      
    </header>


    <!-- MENÚ ANIMETEK  -->
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
            <?php include_once '../InterfazWeb/MenuUsuarios.php';?>
        </nav>
    </div><br>

     <!-- VENTANA EMERGENTE PARA EL BOTON LogOut -->
    <div class="modal fade" id="emergenteLogOut" tabindex="-1" role="dialog" aria-labelledby="emergenteLogOut"
        aria-hidden="true">
        <div class="modal-dialog ventanaEmergente" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="emergenteLogOut">LogOut</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Quiéres cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <span class="">
                        <button type="button" class="btn btn-success">
                            <a href="../Login/Desconectarse.php" style="text-decoration: none; color:white">Aceptar</a>
                        </button>
                    </span>

                </div>
            </div>
        </div>
    </div>
 
    <div class="container">
        
        <div class="row">
            <span class="col-md-3"></span>
            <div class=" col-md-6 contenedorFormulario ">
                <form action="ComprobarRegistro.php" id="FormularioRegistro" method="post" enctype="multipart/form-data">
                    <legend>Registro</legend>
                    <div class="form-row">
                            <!-- USUARIO -->
                        <div class="grupo_usuario col-md-6 ">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" placeholder="Ace_360" class="form-control" id="usuario" required autofocus><br>
                            <p class="mensajeError-oculto" id="mError-usuario">&nbsp;¡El usuario puede contener muyúsculas, minúsculas, números, guiones y guiones bajos![3-9]</p>
                        </div><br>
                        
                        <!-- NOMBRE-->
                        <div class="grupo_nombre col-md-6  ">
                            <label for="nombre"><strong>Nombre</strong></label>
                            <input type="text" name="nombre" placeholder="Ace" id="nombre" class="form-control" required >
                            <br>
                            <p class="mensajeError-oculto" id="mError-nombre">&nbsp;¡El nombre solo puede contener letras mayúsculas, minúsculas y espacios para nombres compuestos![1-20]</p>
                        </div><br>
                        <!-- PRIMER APELLIDO-->
                        <div class="grupo_primerApellido col-md-6 ">
                            <label for="primerApellido"> Primer Apellido</label>
                            <input type="text" name="primerApellido" placeholder="Portgas" id="primerApellido" class="form-control" required><br>
                            <p class="mensajeError-oculto" id="mError-apellido1">&nbsp;¡El primer apellido solo puede contener letras mayúsculas, minúsculas! [1-30]</p>
                        </div><br>
                        <!-- SEGUNDO APELLIDO-->
                        <div class="grupo_segundoApellido col-md-6 ">
                            <label for="segundoApellido"> Segundo Apellido</label>
                            <input type="text" name="segundoApellido" placeholder="Monkey" id="segundoApellido" class="form-control" required><br>
                            <p class="mensajeError-oculto" id="mError-apellido2">&nbsp;¡El segundo apellido solo puede contener letras mayúsculas, minúsculas! [1-30]</p>
                        </div><br>
                        <!-- CONTRASEÑA -->
                        <div class="grupo_password col-md-6 ">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required><br>
                            <p class="mensajeError-oculto" id="mError-password">&nbsp;¡La contraseña debe contener al menos, una mayúscula, una minúscula, un número, un carácter especial y una longitud mínima de 8 carácteres!</p>
                        </div><br>
                        <!-- REPETIR CONTRASEÑA -->
                        <div class="grupo_repeatPassword col-md-6 ">
                            <label for="repeatPassword">Repite la contraseña</label>
                            <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required ><br>
                            <p class="mensajeError-oculto" id="mError-repeatPassword">&nbsp;¡Las contraseñas no coinciden!</p>
                        </div><br>
                        <!-- TELÉFONO -->
                        <div class="grupo_telefono col-md-6 ">
                            <label for="telefono">Teléfono</label>
                            <input type="telefono" name="telefono" placeholder="+34 666 344 014" id="telefono" class="form-control" required><br>
                            <p class="mensajeError-oculto" id="mError-telefono">&nbsp;¡El teléfono no cumple el formato de España!</p>
                        </div><br>
                        <!-- DNI-->
                        <div class="grupo_dni col-md-6 ">
                            <label for="dni">DNI</label>
                            <input type="dni" name="dni" id="dni" placeholder="45315557Y" class="form-control" required><br>
                            <p class="mensajeError-oculto" id="mError-dni">&nbsp;¡El DNI no cumple el formato.!</p>
                        </div><br>
                        <!-- EMAIL -->
                        <div class="grupo_email col-md-12 ">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" placeholder="Ace360@gmail.com" class="form-control"><br>
                            <p class="mensajeError-oculto" id="mError-email">&nbsp;¡El correo no cumple el formato.!</p>
                        </div><br>
                        <!-- imagen -->
                        <div class="form-group">
                            
                            <input type="file" name="fotoPerfil" id="fotoPerfil">
                        </div><br>
                                            
    
                        <div class="grupo_envio col-md-6 ">
                            <input type="submit" class="btn btn-success btn-lg col-md-12" value="Enviar">
                        </div>
                        <div class="grupo_limpiar col-md-6 ">
                            <div class="d-block d-sm-block d-md-none"><br></div>
                            <input type="reset" class="btn btn-primary btn-lg col-md-12" value="Limpiar">
                            
                        </div>
                    </div>
                    <br>
                        <p class="errorFormulariosBD"><?php 
                                if(isset($_GET['error']) && $_GET['error'] == "telefonoExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."El número de telefono ya existe.";}
                                if(isset($_GET['error']) && $_GET['error'] == "usuarioExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."El usuario que ha introducido ya existe.";  } 
                                if(isset($_GET['error']) && $_GET['error'] == "emailExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."El email que ha introducido ya existe.";  }
                                if(isset($_GET['error']) && $_GET['error'] == "dniExiste"){ echo '<i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;'."El DNI que ha introducido ya existe.";  }
                            ?>
                            
                        </p>
    
    
                </form>

            </div>
            <span class="col-md-3"></span>
        </div> 
           


       
        
    </div>
    <br>
    <?php include_once "../InterfazWeb/Footer.php"?>
    
    <!--Scripts-->  
    <script src="../../../JS/FormularioRegistro.js"></script> 
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>