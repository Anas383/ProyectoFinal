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
    // RECIBIMOS Y GUARDAMOS EN UNA VARIABLE EL GET DEL idUsuario
    $idUsuario=$_GET['idUsuario'];
    // SELECCIONAMOS EL USUARIO POR EL ID
    $buscar=listarUsuariosId($conexion, $idUsuario);
    $usuario=mysqli_fetch_assoc($buscar);
?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios AnimeTEK</title>
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
    <!-- LINK ESTILOS DE LA PÁGINA CSS -->
    <link rel="stylesheet" href="../../../CSS/Estilos.css">
    <!-- SCRIPT PARA LOADER -->
    <script src="../../../JS/Loader.js"></script>

</head>
<body >
    <!--Loader.-->
    <?php include_once "Loader.php"?>


    <!-- CABECERA ANIMETEK -->
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
            <div class=" col-md-6 contenedorFormulario ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active " aria-current="page">Home</li>
                        <li class="breadcrumb-item active " aria-current="page">Administración de Usuarios</li>
                        <li class="breadcrumb-item " aria-current="page">Modificar de Usuario</li>
                    </ol>
                </nav>
                <!-- FORMULARIO MODIFICAR USUARIO-->
                <form action="GuardarModificacionesUsuarioAdmin.php?idUsuario=<?php echo $usuario['idUsuario'];?>" id="FormularioRegistro" method="post" enctype="multipart/form-data">
                    <legend>Modificar <?php echo $usuario['Usuario']?> </legend>
                    <div class="form-row">
                            <!-- USUARIO -->
                        <div class="grupo_usuario col-md-6 ">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $usuario['Usuario']?>"><br>
                            <p class="mensajeError-oculto" id="mError-usuario">&nbsp;¡El usuario puede contener muyúsculas, minúsculas, números, guiones y guiones bajos![3-9]</p>
                        </div><br>
                        
                        <!-- NOMBRE-->
                        <div class="grupo_nombre col-md-6  ">
                            <label for="nombre"><strong>Nombre</strong></label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $usuario['Nombre']?>" >
                            <br>
                            <p class="mensajeError-oculto" id="mError-nombre">&nbsp;¡El nombre solo puede contener letras mayúsculas, minúsculas y espacios para nombres compuestos![1-20]</p>
                        </div><br>
                        <!-- PRIMER APELLIDO-->
                        <div class="grupo_primerApellido col-md-6 ">
                            <label for="primerApellido"> Primer Apellido</label>
                            <input type="text" name="primerApellido"  id="primerApellido" class="form-control" value="<?php echo $usuario['PrimerApellido']?>"><br>
                            <p class="mensajeError-oculto" id="mError-apellido1">&nbsp;¡El primer apellido solo puede contener letras mayúsculas, minúsculas! [1-30]</p>
                        </div><br>
                        <!-- SEGUNDO APELLIDO-->
                        <div class="grupo_segundoApellido col-md-6 ">
                            <label for="segundoApellido"> Segundo Apellido</label>
                            <input type="text" name="segundoApellido"  id="segundoApellido" class="form-control" value="<?php echo $usuario['SegundoApellido']?>"><br>
                            <p class="mensajeError-oculto" id="mError-apellido2">&nbsp;¡El segundo apellido solo puede contener letras mayúsculas, minúsculas! [1-30]</p>
                        </div><br>
                        <!-- CONTRASEÑA -->
                        <div class="grupo_password  col-md-6">  
                        <label for="password">Contraseña</label>
                            <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario['Password']?>"><br>
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-outline-dark" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div><br>
                            <p class="mensajeError-oculto" id="mError-password">&nbsp;¡La contraseña debe contener al menos, una mayúscula, una minúscula, un número, un carácter especial y una longitud mínima de 8 carácteres!</p>
                        </div>
                        <!-- TELÉFONO -->
                        <div class="grupo_telefono col-md-6 ">
                            <label for="telefono">Teléfono</label>
                            <input type="telefono" name="telefono" id="telefono" class="form-control" value="<?php echo $usuario['Telefono']?>"><br>
                            <p class="mensajeError-oculto" id="mError-telefono">&nbsp;¡El teléfono no cumple el formato de España!</p>
                        </div><br>
                        <!-- DNI-->
                        <div class="grupo_dni col-md-6 ">
                            <label for="dni">DNI</label>
                            <input type="dni" name="dni" id="dni"  class="form-control" value="<?php echo $usuario['DNI']?>"><br>
                            <p class="mensajeError-oculto" id="mError-dni">&nbsp;¡El DNI no cumple el formato.!</p>
                        </div><br>
                        <!-- EMAIL -->
                        <div class="grupo_email col-md-6 ">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $usuario['Email']?>" ><br>
                            <p class="mensajeError-oculto" id="mError-email">&nbsp;¡El correo no cumple el formato.!</p>
                        </div><br>
                        <!-- ROL -->
                        <div class="grupo_rol col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="rol">Rol</label>
                                </div>
                                <select class="custom-select" name="rol" id="rol">
                                    <option value="<?php echo $usuario['ROL']?>" selected><?php echo $usuario['ROL']?></option>
                                    <option value="Usuario">Usuario</option>
                                    <option value="Administrador">Administrador</option>
                                    
                                </select>
                            </div>
                        </div>
                        <!-- imagen -->
                        <div class="form-group grupo_ col-md-12 " >
                            <label for="fotoPerfil">Foto de Perfil</label><br>
                            <input type="file"  name="fotoPerfil" id="fotoPerfil">
                        </div><br>
                                        
                        <div class="grupo_envio col-md-6 ">
                            <input type="submit" class="btn btn-success btn-lg col-md-12" value="Enviar">
                        </div>
                        <div class="grupo_limpiar col-md-6 ">
                            <div class="d-block d-sm-block d-md-none"><br></div>
                            <input type="reset" class="btn btn-primary btn-lg col-md-12" value="Limpiar">
                            
                        </div>
                        
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
    <script src="../../../JS/FormularioRegistro.js"></script> 
    <!-- SCRIPT FONT AWSOME PARA LOS ICONOS  -->
    <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-a11y="true"></script>
    <!-- SCRIPT DE BOOTSTRAP  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- SCRIPT NECESARIO PARA JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>               
    <script src="../../../JS/Catalogo.js"></script>
</body>
</html>