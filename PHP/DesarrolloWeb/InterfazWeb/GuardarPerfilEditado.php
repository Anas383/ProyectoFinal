<?php

//IMPORTAMOS LOS ARCHIVOS NECESARIOS

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';

//RECOGEMOS LOS CAMPOS DEL HTML

$usuario= $_POST['usuario'];
$nombre= $_POST['nombre'];
$apellido1= $_POST['primerApellido'];
$apellido2= $_POST['segundoApellido'];
$telefono=$_POST['telefono'];
$password= $_POST['password'];
$email= $_POST['email'];
$dni=$_POST['dni'];


//NOS CONECTAMOS A LA BASE DE DATOS

$conexion= conectar(true);

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
    header('Location:../InterfazWeb/Home.php?registrado=usuarioRegistrado');
}

?>