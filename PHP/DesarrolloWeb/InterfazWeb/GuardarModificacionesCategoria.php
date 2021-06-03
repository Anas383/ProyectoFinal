<?php
  //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
  if(!isset($_SERVER['HTTP_REFERER'])){
      header("Location: Home.php");
      exit;
  }
  //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOs DAO DE FUNCIONES
  require '../../BD/ConectorBD.php';
  require '../../BD/DAOProductos.php';
  //CONECTAMOS A LA BASE DE DATOS
  $conexion=conectar(true);
  //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
  $idCategoria=$_GET['idCategoria'];
  $nombre= $_POST['nombre'];
  $descripcion= $_POST['descripcion'];
  $logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));

 
  
  if($logo==NULL){
    // SI NO SE INSERTA UNA IMAGEN COMO LOGO SE MODIFICA LO DEMAS MENOS EL LOGO
      $modificarCategoriaSinLogo=modificarCategoriaSinLogo($conexion, $nombre, $descripcion, $idCategoria);
    header('Location: AdministrarCategorias.php');
  }else{
    // SI SE INSERTA UN LOGO SE MODIFICA TODO
     $modificarCategoria= modificarCategoriaLogo($conexion, $nombre, $descripcion, $logo, $idCategoria);
     header('Location: AdministrarCategorias.php');
  } 

?>