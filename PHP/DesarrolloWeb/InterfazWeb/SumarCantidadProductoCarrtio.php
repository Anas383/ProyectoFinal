
<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);


$idItem=$_GET['idItem'];
$sumarCantidad= SumarCantidadProductosEnElCarrito($conexion, $idItem);

header('Location: MostrarCarrito.php');
?>