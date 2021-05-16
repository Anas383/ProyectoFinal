<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);

$idProducto=$_POST['idProducto'];
$idUsuario=$_POST['idUsuario'];
$comentario=$_POST['comentario'];


$enviarComentarios=enviarComentarios($conexion, $comentario, $idUsuario, $idProducto );





?>