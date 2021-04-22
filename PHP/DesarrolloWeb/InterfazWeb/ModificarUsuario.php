<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
session_start();

$idUsuario=$_GET['idUsuario'];
$buscar=listarUsuariosId($conexion, $idUsuario);


if(mysqli_num_rows($buscar)!=0){
    $fila=mysqli_fetch_assoc($buscar);
    foreach($fila as $atributo => $valor){
        echo "<b>". $atributo."</b>"." : ".$valor."<br>";
    }

}
else{
  
}


?>