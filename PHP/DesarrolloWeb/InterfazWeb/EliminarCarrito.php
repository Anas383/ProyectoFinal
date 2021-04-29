<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();

$idUsuario=$_GET['idUsuario'];

$eliminarUsuario=eliminarCarro($conexion, $idUsuario);

header("Location: EliminarUsuario.php?idUsuario=$idUsuario");
?>