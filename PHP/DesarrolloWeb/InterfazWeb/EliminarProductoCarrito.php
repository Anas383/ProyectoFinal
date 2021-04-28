
<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);
session_start();

$idItem=$_GET['idItem'];
$eliminarItem=eliminarProductosCarrito($conexion,$idItem);

header('Location: MostrarCarrito.php');
?>