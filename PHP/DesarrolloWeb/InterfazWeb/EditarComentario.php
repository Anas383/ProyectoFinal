<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
$idComentario=$_POST['idComentario'];
$comentario=$_POST['comentario'];
$editarComentario=editarComentarios($conexion, $idComentario, $comentario);

?>