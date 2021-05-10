<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);

$idDireccion=$_GET['idDireccion'];


$eliminarDireccion=eliminarDireccion($conexion, $idDireccion);
header('Location: AdministrarDirecciones.php');


?>