<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);
session_start();

$idCesta=$_SESSION['idUsuario'];

$buscarProductos=buscarProductosParaPagar($conexion,$idCesta);

while($productos=mysqli_fetch_assoc($buscarProductos)){
    $eliminar=eliminarStockCarrito($conexion,$productos['Cantidad'],$productos['idProductoCarrito']);
}
$vaciarCarrito=vaciarCarrito($conexion,$idCesta);
header('Location: PagoFinalizado.php');

?>