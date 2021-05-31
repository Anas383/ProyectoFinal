<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();

$idProducto=$_POST['idProducto'];
$idUsuario=$_POST['idUsuario'];
$comentario=$_POST['comentario'];
$usuario=$_SESSION['Usuario'];

$enviarComentarios=enviarComentarios($conexion, $comentario, $idUsuario, $idProducto, $usuario);





?>