<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
 require '../../BD/ConectorBD.php';
 require '../../BD/DAOUsuarios.php';
 $conexion=conectar(true);

session_start();

$total=$_GET['precioTotal'];
$cp=$_POST['cp'];
$provincia=$_POST['provincia'];
$comunidadAutonoma=$_POST['comunidadAutonoma'];
$calle=$_POST['calle'];
$numero=$_POST['numero'];
$piso=$_POST['piso'];
$portal=$_POST['portal'];
$idUsuario= $_SESSION['idUsuario'];

$buscarDomicilio=BuscarUsuarioDomicilio($conexion,$idUsuario);
if(mysqli_num_rows($buscarDomicilio)!=0){
    $actualizarDomicilio=modificarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero, $piso, $cp ,$portal);
}else{
   $insertarNuevoDomicilio= insertarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero,  $cp );
}


header("Location: Pagar.php?precioTotal=$total");

?>