<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
session_start();
$conexion=conectar(true);

$idUsuario= $_SESSION['idUsuario']; 
$darseDeBaja=darseDeBaja($conexion, $idUsuario);
session_destroy();

header("Location: Home.php");

?>