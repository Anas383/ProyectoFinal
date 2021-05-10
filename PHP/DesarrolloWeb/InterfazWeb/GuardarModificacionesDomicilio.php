<?php
 require '../../BD/ConectorBD.php';
 require '../../BD/DAOUsuarios.php';
 $conexion=conectar(true);

session_start();


$cp=$_POST['cp'];
$provincia=$_POST['provincia'];
$comunidadAutonoma=$_POST['comunidadAutonoma'];
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$piso=$_POST['piso'];
$portal=$_POST['portal'];
$idUsuario=$_POST['idUsuarioCF'];


$actualizarDomicilio=modificarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero, $piso, $cp ,$portal);


header("Location: AdministrarDirecciones.php");

?>