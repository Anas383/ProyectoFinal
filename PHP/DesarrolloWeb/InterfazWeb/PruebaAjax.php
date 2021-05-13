<?php
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
require '../../BD/DAOProductos.php';

$conexion=conectar(true);
session_start();
$nombre= $_POST['name'];
$precio= $_POST['precio'];
$cantidad= $_POST['cantidad'];
$idCesta=$_SESSION['idUsuario'];
$añadirProductosAlCarrito= añadirProductosAlCarrito($conexion,$cantidad, $precio, $idCesta, $nombre);
echo "Se añadio";

?>