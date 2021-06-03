<?php

  //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOs DAO DE FUNCIONES
  require '../../BD/ConectorBD.php';
  require '../../BD/DAOProductos.php';
  //CONECTAMOS A LA BASE DE DATOS
  $conexion=conectar(true);
  session_start(); 
  //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP 
  $idCesta=$_SESSION['idUsuario'];
  $listarProductosCarrito=  listarProductosCarrito($conexion,$idCesta); 
  $productosCarrito=mysqli_fetch_assoc($listarProductosCarrito);
  echo $productosCarrito['Cantidad']; 

  

?>