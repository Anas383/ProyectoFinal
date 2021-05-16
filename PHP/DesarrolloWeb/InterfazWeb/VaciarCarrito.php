<?php
  require '../../BD/ConectorBD.php';
  require '../../BD/DAOProductos.php';
 $conexion=conectar(true);
session_start();
$idUsuario=$_SESSION['idUsuario'];

$vaciarCarrito=vaciarCarrito($conexion,$idUsuario);

header('Location: MostrarCarrito.php');


?>