<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
 require '../../BD/ConectorBD.php';
 require '../../BD/DAOProductos.php';
 $conexion=conectar(true);

 $nombre= $_POST['nombre'];
 $categoria= $_POST['categorias'];
 $descripcion= $_POST['descripcion'];
 $precio= $_POST['precio'];
 $stock= $_POST['stock'];
 $imagenProducto=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

 $buscarNombre= buscarProductoPorNombre($conexion, $nombre);

if(mysqli_num_rows($buscarNombre)!=0){
    header('Location: InsertarNuevoProducto.php?error=nombreExiste');
}else{

    $insertarProducto=insertarNuevoProducto($conexion, $nombre, $categoria, $descripcion, $precio, $stock, $imagenProducto);

    header('Location: AdministrarProductos.php');

}
?>