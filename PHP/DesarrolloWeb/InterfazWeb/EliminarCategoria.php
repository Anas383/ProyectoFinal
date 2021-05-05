<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);

$idCategoria=$_GET['idCategoria'];

$eliminarCategoria= eliminarCategoriaPorID($conexion, $idCategoria);

header('Location: AdministrarCategorias.php');

?>