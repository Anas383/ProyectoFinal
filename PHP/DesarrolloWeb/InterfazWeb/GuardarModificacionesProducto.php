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
  $idProducto=$_GET['idProducto'];
  $nombre= $_POST['nombre'];
  $categoria= $_POST['categorias'];
  $descripcion= $_POST['descripcion'];
  $precio= $_POST['precio'];
  $stock= $_POST['stock'];
  $imagenProducto=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));   

  if($imagenProducto==NULL){
    // SI NO SE INSERTA UNA IMAGEN COMO LOGO SE MODIFICA LO DEMAS MENOS LA IMAGEN
    $modificarSinImagen= modificarSinImagenProducto($conexion,$idProducto, $nombre, $categoria, $descripcion, $precio, $stock);
    header('Location: AdministrarProductos.php');
  }else{
    // SI SE INSERTA UNA IMAGEN SE MODIFICA TODO
    $modificarTodo=modificarProducto($conexion,$idProducto, $nombre, $categoria, $descripcion, $precio, $stock, $imagenProducto);
    header('Location: AdministrarProductos.php');
  }


?>  