<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);


$idItem=$_GET['idItem'];
$eliminarItem=eliminarProductosCarrito($conexion,$idItem);

header('Location: MostrarCarrito.php');
?>