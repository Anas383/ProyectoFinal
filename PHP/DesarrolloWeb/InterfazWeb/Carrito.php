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
  $stock= $_POST['stock'];
  $idCesta=$_SESSION['idUsuario'];
  $comprobarProducto=buscarProductosEnElCarrito2($conexion, $idProducto, $idCesta);
  if($cantidad==0){
    $cantidad+=1;
  }

  if($stock==0){
   echo "No hay Stock";
  }else{
    
  if(mysqli_num_rows($comprobarProducto)!=0){
    $product=mysqli_fetch_assoc($comprobarProducto);
    $idItem=$product['idItem'];
    $cantidad=$product['Cantidad'];
     $actualizar=actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidad);
     
  }else{
    $añadirProductosAlCarrito= añadirProductosAlCarrito($conexion,$cantidad, $precio, $idCesta, $idProducto);
    
  }
  
  }

 



  
   

  
}
    


?>