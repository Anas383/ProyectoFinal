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
  $nombre= $_POST['nombre'];
  $descripcion= $_POST['descripcion'];
  $logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));
  // EN ESTA CONSULTA COMPROBAMOS SI YA EXISTE LA CATEGORÍA
  $comprobar_nombre=comprobarNombreCategoria($conexion, $nombre);

  if(mysqli_num_rows($comprobar_nombre)!=0){
    // SI LA CATEGORIA EXISTE SE REEDIRIGE CON UN ERROR
    header('Location:InsertarNuevaCategoria.php?error=nombreExiste');
  }else{
    // SI NO EXISTE LA CATEGORIA SE INSERTA
    $insertarNuevaCategoria=insertarNuevaCategoria($conexion, $nombre,$descripcion, $logo);
    header('Location: AdministrarCategorias.php');
  }
 

?>