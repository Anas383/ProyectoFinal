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
    $consulta = "INSERT INTO ProductosCarrito (Cantidad, PrecioProducto, idCesta, idProductoCarrito) VALUES ('$cantidadProducto', '$precioProducto', '$idCesta', '$idProducto')";
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
    $consulta = "SELECT SUM(PrecioProducto) FROM ProductosCarrito where idCesta='$idCesta' ";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}
function insertarPrecioTotalTablaCarrito($conexion,$idCesta, $total){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "UPDATE Carrito SET PrecioTotal = '$total' WHERE idCarrito = '$idCesta'";
    $resultado= mysqli_query($conexion,$consulta);
   return $resultado;
}

function vaciarCarrito($conexion,$idCesta){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "DELETE FROM ProductosCarrito WHERE idCesta='$idCesta'";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}

function inputBusqueda($conexion,$variableBusqueda){
    //COMPARAMOS LOS DATOS DEL USUARIO
    $consulta = "SELECT * FROM Productos where  NombreProducto like '%$variableBusqueda%' ;";
    $resultado= mysqli_query($conexion,$consulta);
    return $resultado;
}




?>