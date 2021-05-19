<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();

$idProducto=$_POST['idProducto'];
$idUsuario=$_POST['idUsuario'];
$comentario=$_POST['comentario'];
$usuario=$_SESSION['Usuario'];
echo $usuario;

$enviarComentarios=enviarComentarios($conexion, $comentario, $idUsuario, $idProducto, $usuario);





?>