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




?>