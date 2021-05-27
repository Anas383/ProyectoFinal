
<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);
session_start();
$idCesta=$_SESSION['idUsuario'];
$idProducto=$_GET['idProducto'];
$idItem=$_GET['idItem'];
$buscarProductoCarrito=mysqli_fetch_assoc(buscarProductoCarrito($conexion,$idCesta, $idItem));
$buscarProducto=mysqli_fetch_assoc(buscarProductoPorID($conexion, $idProducto));
echo $buscarProductoCarrito['Cantidad'];
echo $buscarProducto['Stock'];
if($buscarProductoCarrito['Cantidad']>=$buscarProducto['Stock']){
    header('Location: MostrarCarrito.php?stock=limiteStockAlcanzado');
}else{
    $sumarCantidad= SumarCantidadProductosEnElCarrito($conexion, $idItem);
    header('Location: MostrarCarrito.php');
}

?>