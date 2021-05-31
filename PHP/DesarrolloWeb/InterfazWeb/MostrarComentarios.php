<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
$idP=$_GET['id'];
session_start();


$resultado =  mostrarComentariosComentarios($conexion, $idP);
$iconoBorrar="NEPE";
$json= array();

while($mostrar= mysqli_fetch_array($resultado)){
    $json[]= array(
        'Comentario' => $mostrar['Comentario'],
        'Nombre' => $mostrar['Usuario'],
        'idUsuario' => $mostrar['idUsuario_VC'],
        'idComentario'=> $mostrar['idValoracionesComentarios'],
        'ROL' => $_SERVER['ROL']
        
    );
}

$jsonstring=json_encode($json);

echo $jsonstring;






?>