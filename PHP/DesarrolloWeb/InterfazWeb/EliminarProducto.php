<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);

$idProducto=$_GET['idProducto'];

$eliminarProducto=eliminarProductoPorID($conexion, $idProducto);

header('Location: AdministrarProductos.php');

?>