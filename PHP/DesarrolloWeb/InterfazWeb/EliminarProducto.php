<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);

$idProducto=$_GET['idProducto'];

$eliminarProducto=eliminarProductoPorID($conexion, $idProducto);

header('Location: AdministrarProductos.php');

?>