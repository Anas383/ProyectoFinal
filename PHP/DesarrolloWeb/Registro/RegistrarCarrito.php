<?php
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
session_start();
$conexion= conectar(true);

$ultimoId = mysqli_insert_id($conexion);

echo $ultimoId;


?>