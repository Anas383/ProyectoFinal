<?php

    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    session_start();

    //RECOGEMOS LOS CAMPOS DEL PHP
    $captcha=$_POST['g-recaptcha-response'];
    $secret='6LeeQ-0aAAAAAAJpk_tcwVQm-iAJ9guUHoW1_Joo';
    $usuario= $_POST['usuario'];
    $nombre= $_POST['nombre'];
    $apellido1= $_POST['primerApellido'];
    $apellido2= $_POST['segundoApellido'];
    $telefono=$_POST['telefono'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $dni=$_POST['dni'];
    $fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));
    //NOS CONECTAMOS A LA BASE DE DATOS

    $conexion= conectar(true);

    // COMPROBAMOS SI SE VALIDA EL CAPTCHA
    if(!$captcha){
        // SI NO SE VALIDA LE MANDAMOS UN ERROR
        header('Location: Registro.php?error=captchaNoVerificado');
    }
    // ENVIAMOS LA CLAVE SECRETA Y EL CAPTCHA AL SISTEMA DE VERIFICACION
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
    // Y DESCIFRAMOS EL RESULTADO CON JSON
    $arr=json_decode($response, true);

    if($arr['success']){
        // SI EXISTE REGISTRAMOS AL USUARIO
        //REALIZAMOS LAS CONSULTAS
        $buscarUsuario= consultaBuscarUsuario($conexion,$usuario);
        $buscarTelefono= buscarTelefono($conexion,$telefono);
        $buscarEmail= buscarEmail($conexion,$email);
        $buscarDNI= consultaBuscarDNI($conexion,$dni);

        // COMPROBAMOS QUE EL USUARIO NO EXISTA, SI EXISTE ALGUN DATO DE ESTOS LE MANDAMOS UN ERROR
        if(mysqli_num_rows($buscarUsuario)!=0){
        header('Location: Registro.php?error=usuarioExiste');
        }else if(mysqli_num_rows($buscarTelefono)!=0){
        header('Location: Registro.php?error=telefonoExiste');
        }else if(mysqli_num_rows($buscarEmail)!=0){
        header('Location: Registro.php?error=emailExiste');
        }else if(mysqli_num_rows($buscarDNI)!=0){
        header('Location: Registro.php?error=dniExiste');
        }
        else{
        // SI NO EXISTE INSERTAMOS AL USUARIO
        $realizarConsulta=registrarUsuario($conexion,$usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil);
        $ultimoId = mysqli_insert_id($conexion);
        $idCarrito=$ultimoId;
        $idUsuario=$ultimoId;
        $registrarCarrito=registrarUsuarioCarrito($conexion,$idCarrito, $idUsuario);

        header('Location:../InterfazWeb/Home.php?registrado=usuarioRegistrado');
        }

    }else{
        // SI HAY UN FALLO EN EL SISTEMA DE VERIFICACION DE GOOGLE LE ENVIAMOS UN ERROR
        header('Location: Registro.php?error=errorAlVerificarCaptcha');
    }


?>