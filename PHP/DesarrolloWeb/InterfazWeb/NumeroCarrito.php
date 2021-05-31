<?php 

session_start();
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
require '../../BD/DAOProductos.php';

$conexion=conectar(true);
                        
$idCesta=$_SESSION['idUsuario'];
$contarProductos=contarProductos($conexion, $idCesta);
$totalProductos=mysqli_fetch_assoc($contarProductos);
echo($totalProductos['Count(idCesta)']); 
?>