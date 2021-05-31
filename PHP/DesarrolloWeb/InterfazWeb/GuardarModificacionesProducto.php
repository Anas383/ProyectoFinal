<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: Home.php");
    exit;
}
 require '../../BD/ConectorBD.php';
 require '../../BD/DAOProductos.php';
 $conexion=conectar(true);
 $idProducto=$_GET['idProducto'];
 $nombre= $_POST['nombre'];
 $categoria= $_POST['categorias'];
 $descripcion= $_POST['descripcion'];
 $precio= $_POST['precio'];
 $stock= $_POST['stock'];
 $imagenProducto=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));   

 if($imagenProducto==NULL){
   $modificarSinImagen= modificarSinImagenProducto($conexion,$idProducto, $nombre, $categoria, $descripcion, $precio, $stock);
   header('Location: AdministrarProductos.php');
 }else{
   $modificarTodo=modificarProducto($conexion,$idProducto, $nombre, $categoria, $descripcion, $precio, $stock, $imagenProducto);
   header('Location: AdministrarProductos.php');
 }


?>  