<?php
 session_start();
 require '../../BD/ConectorBD.php';
 require '../../BD/DAOUsuarios.php';
 require '../../BD/DAOProductos.php';
 require '../../BD/Config.php';
 $conexion=conectar(true);


if($_SESSION['usuarioConectado']==false){

  
    
}elseif($_SESSION['usuarioConectado']==true){
  $idProducto= $_POST['idProducto'];
  $precio= $_POST['precio'];
  $cantidad= $_POST['cantidad'];
  $idCesta=$_SESSION['idUsuario'];

  $añadirProductosAlCarrito= añadirProductosAlCarrito($conexion,$cantidad, $precio, $idCesta, $idProducto);
    
    header('Location: Catalogo.php');

  
}
    


?>