<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();
$idUsuario=$_GET['idUsuario'];
$usuario= $_POST['usuario'];
$nombre= $_POST['nombre'];
$apellido1= $_POST['primerApellido'];
$apellido2= $_POST['segundoApellido'];
$telefono=$_POST['telefono'];
$password= $_POST['password'];
$email= $_POST['email'];
$dni=$_POST['dni'];
$rol=$_POST['rol'];
$fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));


if($fotoPerfil==NULL){
    $modificarSinImagen= modificarUsuarioSinImagen($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $rol);
    header('Location: AdministrarUsuarios.php');
}else{
    $modificar= modificarUsuario($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $rol, $fotoPerfil);
    header('Location: AdministrarUsuarios.php');
}



?>