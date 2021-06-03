<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOs DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    // INICIAMOS SESSION
    session_start();
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $idUsuario=$_SESSION['idUsuario'];
    $usuario= $_POST['usuario'];
    $nombre= $_POST['nombre'];
    $apellido1= $_POST['primerApellido'];
    $apellido2= $_POST['segundoApellido'];
    $telefono=$_POST['telefono'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $dni=$_POST['dni'];
    $fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));



    if($fotoPerfil==NULL){
        // SI NO SE INSERTA UNA IMAGEN COMO LOGO SE MODIFICA LO DEMAS MENOS LA IMAGEN
        $modificarSinImagen= editarPerfilSinImagen($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni);
        header('Location: Perfil.php');
        
    }else{
        // SI SE INSERTA UNA IMAGEN SE MODIFICA TODO
        $modificar=editarPerfil($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil);
        header('Location: Perfil.php');
    
    }


?>