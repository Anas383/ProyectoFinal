<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();

$idUsuario=$_GET['idUsuario'];

$eliminarUsuario=eliminarUsuario($conexion, $idUsuario);

header('Location: AdministrarUsuarios.php');
?>