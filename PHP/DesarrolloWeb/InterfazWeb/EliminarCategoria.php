<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOProductos.php';
$conexion=conectar(true);

$idCategoria=$_GET['idCategoria'];

$eliminarCategoria= eliminarCategoriaPorID($conexion, $idCategoria);

header('Location: AdministrarCategorias.php');

?>