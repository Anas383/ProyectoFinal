<?php
 session_start();
 require '../../BD/ConectorBD.php';
 require '../../BD/DAOUsuarios.php';
 require '../../BD/DAOProductos.php';
 require '../../BD/Config.php';
 $conexion=conectar(true);


if($_SESSION['usuarioConectado']==false){

  header('Location: Catalogo.php?sesionNoIniciadaC=sesionCarritoNoIniciada'); 
    
}elseif($_SESSION['usuarioConectado']==true){
    $idProducto=$_POST['idProducto'];
    $precioProducto=$_POST['precioProducto'];
    $cantidadProducto=$_POST['cantidadProducto'];
    $idCesta=$_POST['idUsuario'];

    $añadirProductosAlCarrito= añadirProductosAlCarrito($conexion,$cantidadProducto, $precioProducto, $idCesta, $idProducto);
    
    header('Location: Catalogo.php');

  
}
    


?>