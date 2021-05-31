<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
      header("Location: Home.php");
      exit;
  }
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
  $product=mysqli_fetch_assoc($comprobarProducto);

  if($cantidad==0){
    $cantidad+=1;
  }
  if($product['Cantidad']>=$stock){
    echo 'Has excedido el stock';
  }
  elseif($stock==0){
    
  }else{
    
  if(mysqli_num_rows($comprobarProducto)!=0 ){
    
    $idItem=$product['idItem'];
    $cantidadP=$product['Cantidad'];
     $actualizar=actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidadP);
     
  }
  else{
    $añadirProductosAlCarrito= añadirProductosAlCarrito($conexion,$cantidad, $precio, $idCesta, $idProducto);
    
  }
  
  }

 



  
   

  
}
    


?>