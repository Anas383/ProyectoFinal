
<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);


$idItem=$_GET['idItem'];
$cantidad=$_GET['cantidad'];

if($cantidad==1){
    $eliminarItem=eliminarProductosCarrito($conexion,$idItem);
}else{
    $restarCantidad= RestarCantidadProductosEnElCarrito($conexion, $idItem); 
}

header('Location: MostrarCarrito.php');
?>