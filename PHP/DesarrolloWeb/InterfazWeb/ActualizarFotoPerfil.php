
<?php
session_start();
//Lo primero es importar el archivo para conectarnos a la BD y luego el archivo con el que realizaremos 
//Las consultas

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);

//Ahora toca recoger los datos introducidos por el usuario en el html
$fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));;
$idUsuario= $_GET['idUsuario'];


echo $idUsuario;
$actualizarFotoPerfil= actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario);
header("Location: Perfil.php");






?>

