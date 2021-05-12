<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();
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
    $modificarSinImagen= editarPerfilSinImagen($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni);
    header('Location: Perfil.php');
    
}else{
    $modificar=editarPerfil($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil);
    header('Location: Perfil.php');
 
}



?>