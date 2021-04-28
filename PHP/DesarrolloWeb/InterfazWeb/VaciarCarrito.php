<?php

$idCesta=$_GET['idCesta'];

$vaciarCarrito=vaciarCarrito($conexion,$idCesta);

header('Location: MostrarCarrito.php');


?>