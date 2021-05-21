<?php

function buscarProductosCatalogo($conexion){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "Select*from Productos";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}

function buscarCategoriasCatalogo($conexion){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "Select*from Categorias";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}
function buscarCategoriasCatalogoFiltro($conexion){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "Select*from Categorias";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}
function buscarUnaCategoriaCatalogo($conexion, $idCategoria){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "Select*from Productos WHERE idCategoria='$idCategoria'";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}

function contarProductos($conexion, $idCesta){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "SELECT Count(idCesta) FROM ProductosCarrito where idCesta='$idCesta'";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}


function añadirProductosAlCarrito($conexion,$cantidadProducto, $precioProducto, $idCesta, $idProducto){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "INSERT INTO ProductosCarrito (Cantidad, PrecioProducto, idCesta, idProductoCarrito) VALUES ('$cantidadProducto', '$precioProducto', '$idCesta', '$idProducto')ON DUPLICATE KEY UPDATE Cantidad=Cantidad+1";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}
function listarProductosCarrito($conexion,$idCesta){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "SELECT * FROM TiendaMerchandising.ProductosCarrito where idCesta='$idCesta'";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}
function buscarNombreProductosCarrito($conexion,$idProductoCarritoNombre){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "SELECT * FROM Productos where idProducto='$idProductoCarritoNombre'";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}


function eliminarProductosCarrito($conexion,$idItem){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "DELETE FROM ProductosCarrito WHERE idItem = '$idItem' ";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}


function totalPrecioProductosCarrito($conexion,$idCesta){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "SELECT SUM(PrecioProducto*Cantidad) FROM ProductosCarrito where idCesta='$idCesta' ;";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}
function insertarPrecioTotalTablaCarrito($conexion,$idCesta, $total){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "UPDATE Carrito SET `PrecioTotal` = '$total' WHERE (`idCarrito` = '$idCesta');";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}

function vaciarCarrito($conexion,$idUsuario){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "DELETE FROM ProductosCarrito WHERE idCesta='$idUsuario'";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}

function inputBusqueda($conexion,$variableBusqueda){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "SELECT * FROM Productos where  NombreProducto like '%$variableBusqueda%' ;";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}

function listarProductos($conexion){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Productos;";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function listarCategorias($conexion){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Categorias;";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function buscarProductoPorID($conexion, $idProducto){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Productos where idProducto='$idProducto'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function buscarCategoriaPorID($conexion, $idCategoria){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Categorias where idCategoria='$idCategoria'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function eliminarProductoPorID($conexion, $idProducto){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Delete From Productos where idProducto='$idProducto'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function buscarProductoPorNombre($conexion, $nombre){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * From Productos where NombreProducto='$nombre'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}



function insertarNuevoProducto($conexion, $nombre, $categoria, $descripcion, $precio, $stock,  $imagenProducto ){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "INSERT INTO Productos (idCategoria, NombreProducto, DetallesProducto, Precio, Stock, Imagen) VALUES ('$categoria', '$nombre', '$descripcion', '$precio', '$stock', '$imagenProducto');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function eliminarCategoriaPorID($conexion, $idCategoria){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "DELETE FROM Categorias WHERE idCategoria = '$idCategoria'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function busquedaProductosAdmin($conexion, $variableBusqueda){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "SELECT * FROM Productos where idProducto like '%$variableBusqueda%' 
    or idCategoria like '%$variableBusqueda%'
    or NombreProducto like '%$variableBusqueda%'
    or Precio like '%$variableBusqueda%'
    or Stock like '%$variableBusqueda%';";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function busquedaCategoriasAdmin($conexion, $variableBusqueda){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "SELECT * FROM Categorias where idCategoria like '%$variableBusqueda%' 
    or NombreCategoria like '%$variableBusqueda%'
    or DescripcionCategoria like '%$variableBusqueda%';";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function comprobarNombreCategoria($conexion, $nombre){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "SELECT * FROM Categorias where NombreCategoria='$nombre'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function insertarNuevaCategoria($conexion, $nombre, $descripcion, $logo){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "INSERT INTO Categorias (NombreCategoria, DescripcionCategoria, LogoCategoria) VALUES ('$nombre', '$descripcion', '$logo');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function modificarSinImagenProducto($conexion,$idProducto, $nombre, $categoria, $descripcion, $precio, $stock){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "UPDATE Productos SET idCategoria = '$categoria', NombreProducto = '$nombre', DetallesProducto = '$descripcion', Precio = '$precio', Stock = '$stock' WHERE (idProducto = '$idProducto');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function modificarProducto($conexion, $idProducto, $nombre, $categoria, $descripcion, $precio, $stock, $imagenProducto){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = " UPDATE Productos SET idCategoria = '$categoria', NombreProducto = '$nombre', DetallesProducto = '$descripcion', Precio = '$precio', Stock = '$stock', Imagen = '$imagenProducto' WHERE idProducto = '$idProducto'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function modificarCategoriaSinLogo($conexion, $nombre, $descripcion, $idCategoria){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "UPDATE Categorias SET NombreCategoria = '$nombre', DescripcionCategoria = '$descripcion' WHERE (idCategoria = '$idCategoria');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function modificarCategoriaLogo($conexion, $nombre, $descripcion, $logo, $idCategoria){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "UPDATE Categorias SET NombreCategoria = '$nombre', DescripcionCategoria = '$descripcion', LogoCategoria = '$logo' WHERE (idCategoria = '$idCategoria');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function buscarProductosEnElCarrito($conexion, $idProducto){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "SELECT * FROM ProductosCarrito;";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidad){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "UPDATE ProductosCarrito SET Cantidad = '$cantidad'+1 WHERE (idItem = '$idItem');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function actualizarStockProductos($conexion, $idProducto, $stock){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "UPDATE Productos SET Stock = '$stock' WHERE (idProducto = '$idProducto');";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}










?>