<?php
  
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    $conexion=conectar(true);
    session_start();
    $usuario= $_GET['usuario'];
    if(!$usuario){
        header("Location: ../InterfazWeb/Home.php");
    }
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

                <form action="ConfirmarNuevaPassword.php?usuario=<?php echo $usuario; ?>" id="FormularioNuevaPassword" method="post">
                    <legend>Recuperar Contraseña</legend>
                 
                   <!-- CONTRASEÑA -->
                   <div class="grupo_password  ">  
                        <label for="password">Nueva contraseña</label>
                            <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required><br>
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-outline-dark" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensajeError-oculto" id="mError-password">&nbsp;¡La contraseña debe contener al menos, una mayúscula, una minúscula, un número, un carácter especial y una longitud mínima de 8 carácteres!</p>
                        </div>

                        <!-- REPETIR CONTRASEÑA -->
                        <div class="grupo_repeatPassword ">  
                        <label for="repeatPassword">Repite la contraseña</label>
                            <div class="input-group">
                            <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required ><br>
                                <div class="input-group-append">
                                    <button id="show_repeatPassword" class="btn btn-outline-dark" type="button" onclick="mostrarRepeatPassword()"> <span class="fa fa-eye-slash iconR"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensajeError-oculto" id="mError-repeatPassword">&nbsp;¡Las contraseñas no coinciden!</p>
                        </div>
                    <center>
                        <div class="grupo_envio  ">
                            <input type="submit" class="btn btn-success btn-lg col-md-6" value="Enviar">
                            
                        </div>
                    </center>
                  
                    <br>
                                   
                </form>
            </div>
            
        </div>
       

    </div>
    <br>
    <br>
    <br>
    <?php include_once "../InterfazWeb/Footer.php"?>
     
    <!--Scripts-->   
    <script src="../../../JS/FormularioNuevaPassword.js"></script> 
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>