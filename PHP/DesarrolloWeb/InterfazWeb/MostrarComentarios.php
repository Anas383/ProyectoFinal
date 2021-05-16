<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);

$resultado =  mostrarComentariosComentarios($conexion);

$json= array();

while($mostrar= mysqli_fetch_array($resultado)){
    $json[]= array(
        'Comentario' => $mostrar['Comentario']
    );
}

$jsonstring=json_encode($json);

echo $jsonstring;



?>