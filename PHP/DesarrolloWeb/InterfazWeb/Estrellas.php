<?php
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);

$estrellas=$_POST['valoracion'];
$idProducto=$_POST['idProducto'];
$idUsuario=$_POST['idUsuario'];
$buscarSiExisteValoracion=mostrarValoracion($conexion, $idProducto, $idUsuario);
$mostrarDatosValoracion=mysqli_fetch_assoc($buscarSiExisteValoracion);
$idValoracionEstrellas=$mostrarDatosValoracion['idValoracionEstrellas'];

if(mysqli_num_rows($buscarSiExisteValoracion)!=0){
     $actualizar=actualizarValoracion($conexion, $idValoracionEstrellas, $estrellas);
  
    
}else{
    $insertar=insertarValoracion($conexion, $idProducto, $idUsuario, $estrellas);

}

?>