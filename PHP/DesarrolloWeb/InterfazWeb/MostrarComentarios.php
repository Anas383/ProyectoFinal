<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
$idP=$_GET['id'];


$resultado =  mostrarComentariosComentarios($conexion, $idP);

$json= array();

while($mostrar= mysqli_fetch_array($resultado)){
    $json[]= array(
        'Comentario' => $mostrar['Comentario'],
        'Nombre' => $mostrar['Usuario'],
    );
}

$jsonstring=json_encode($json);

echo $jsonstring;






?>