<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);

$idDireccion=$_GET['idDireccion'];


$eliminarDireccion=eliminarDireccion($conexion, $idDireccion);
header('Location: AdministrarDirecciones.php');


?>