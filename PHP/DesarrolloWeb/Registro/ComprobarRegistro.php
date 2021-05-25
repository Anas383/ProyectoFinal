<?php

//IMPORTAMOS LOS ARCHIVOS NECESARIOS

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
session_start();

//RECOGEMOS LOS CAMPOS DEL HTML
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


if(!$captcha){
    header('Location: Registro.php?error=captchaNoVerificado');
}
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

$arr=json_decode($response, true);

if($arr['success']){
    //REALIZAMOS LAS CONSULTAS
    $buscarUsuario= consultaBuscarUsuario($conexion,$usuario);
    $buscarTelefono= buscarTelefono($conexion,$telefono);
    $buscarEmail= buscarEmail($conexion,$email);
    $buscarDNI= consultaBuscarDNI($conexion,$dni);


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
    $realizarConsulta=registrarUsuario($conexion,$usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil);
    $ultimoId = mysqli_insert_id($conexion);
    $idCarrito=$ultimoId;
    $idUsuario=$ultimoId;
    $registrarCarrito=registrarUsuarioCarrito($conexion,$idCarrito, $idUsuario);

    header('Location:../InterfazWeb/Home.php?registrado=usuarioRegistrado');
    }

}else{
    header('Location: Registro.php?error=errorAlVerificarCaptcha');
}






?>