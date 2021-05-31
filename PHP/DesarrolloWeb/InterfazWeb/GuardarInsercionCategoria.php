<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
      header("Location: Home.php");
      exit;
  }
  require '../../BD/ConectorBD.php';
  require '../../BD/DAOProductos.php';
  $conexion=conectar(true);

  $nombre= $_POST['nombre'];
  $descripcion= $_POST['descripcion'];
  $logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));

  $comprobar_nombre=comprobarNombreCategoria($conexion, $nombre);

  if(mysqli_num_rows($comprobar_nombre)!=0){
    header('Location:InsertarNuevaCategoria.php?error=nombreExiste');
  }else{
     $insertarNuevaCategoria=insertarNuevaCategoria($conexion, $nombre,$descripcion, $logo);
     header('Location: AdministrarCategorias.php');
  }

  

?>