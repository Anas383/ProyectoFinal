<?php

require '../../BD/ConectorBD.php';
$conexion=conectar(true);

$idProducto=$_POST['idProducto'];
$idUsuario=$_POST['idUsuario'];
$comentario=$_POST['comentario'];

$sql="INSERT INTO ValoracionesComentarios (Comentario, idUsuario_VC, idProducto_VC) VALUES ('$comentario', '$idUsuario', '$idProducto');"

$ejecutar= mysqli_query($conexion, $sql);
if($ejecutar){
    echo "<h2> El usuario se ha introducido</h2>";
}

?>