<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
  require '../../BD/ConectorBD.php';
  require '../../BD/DAOProductos.php';
  $conexion=conectar(true);
  $idCategoria=$_GET['idCategoria'];
  $nombre= $_POST['nombre'];
  $descripcion= $_POST['descripcion'];
  $logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));

 

  if($logo==NULL){
      $modificarCategoriaSinLogo=modificarCategoriaSinLogo($conexion, $nombre, $descripcion, $idCategoria);
    header('Location: AdministrarCategorias.php');
  }else{
     $modificarCategoria= modificarCategoriaLogo($conexion, $nombre, $descripcion, $logo, $idCategoria);
     header('Location: AdministrarCategorias.php');
  }

  

?>