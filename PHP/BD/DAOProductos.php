<?php
    // ESTA CONSULTA SE USA PARA LISTAR LOS PRODUCTOS EN EL CATALOGO
    function buscarProductosCatalogo($conexion){
        $consulta = "Select * from Productos";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA LISTAR LAS CATEGORIAS
    function buscarCategoriasCatalogo($conexion){
       
        $consulta = "Select*from Categorias";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA LISTAR LAS CATEGORIAS PARA EL FILTRO
    function buscarCategoriasCatalogoFiltro($conexion){
        $consulta = "Select*from Categorias";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR UNA SOLA CATEGORIA
    function buscarUnaCategoriaCatalogo($conexion, $idCategoria){
        $consulta = "Select*from Productos WHERE idCategoria='$idCategoria'";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA CONTAR LOS PRODUCTOS EN LA TABLA ProductoCarrito
    function contarProductos($conexion, $idCesta){
        $consulta = "SELECT Count(idCesta) FROM ProductosCarrito where idCesta='$idCesta'";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }

    // ESTA CONSULTA SE USA INSERTAR PRODUCTOS EN LA TABLA ProductosCarrito
    function añadirProductosAlCarrito($conexion,$cantidadProducto, $precioProducto, $idCesta, $idProducto){
        $consulta = "INSERT INTO ProductosCarrito (Cantidad, PrecioProducto, idCesta, idProductoCarrito) VALUES ('$cantidadProducto', '$precioProducto', '$idCesta', '$idProducto')";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA LISTAR LOS PRODUCTOS EN LA TABLA ProductosCarrito
    function listarProductosCarrito($conexion,$idCesta){
        $consulta = "SELECT * FROM TiendaMerchandising.ProductosCarrito where idCesta='$idCesta'";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR UN PRODUCTO DETERMINADO EN EL CARRITO
    function buscarProductoCarrito($conexion,$idCesta, $idItem){
        $consulta = "SELECT * FROM ProductosCarrito where idCesta='$idCesta' and idItem ='$idItem'";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    //ESTA CONSULTA LA USO PARA BUSCAR EL NOMBRE DEL PRODUCTO EN LA TABLA PRODUCTOS
    function buscarNombreProductosCarrito($conexion,$idProductoCarritoNombre){
        $consulta = "SELECT * FROM Productos where idProducto='$idProductoCarritoNombre'";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }

    // ESTA CONSULTA SE USA PARA ELIMINAR  PRODUCTOS EN LA TABLA ProductoCarrito
    function eliminarProductosCarrito($conexion,$idItem){
        $consulta = "DELETE FROM ProductosCarrito WHERE idItem = '$idItem' ";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }

    // ESTA CONSULTA SE USA PARA SUMAR EL PRECIO TOTAL DE LA TABLA ProductosCarrito
    function totalPrecioProductosCarrito($conexion,$idCesta){
        $consulta = "SELECT SUM(PrecioProducto*Cantidad) FROM ProductosCarrito where idCesta='$idCesta' ;";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA INSERTAR EL PRECIO TOTAL EN LA TABLA CARRITO
    function insertarPrecioTotalTablaCarrito($conexion,$idCesta, $total){
        $consulta = "UPDATE Carrito SET `PrecioTotal` = '$total' WHERE (`idCarrito` = '$idCesta');";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA VACIAR LA TABLA ProductosCarrito SEGUN EL ID USUARIO
    function vaciarCarrito($conexion,$idUsuario){
        $consulta = "DELETE FROM ProductosCarrito WHERE idCesta='$idUsuario'";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EN LA TABLA SEGUN EL PARAMETRO QUE LE PASES, ES PARA LA BARRA DE BUSQUEDA
    function inputBusqueda($conexion,$variableBusqueda){
       
        $consulta = "SELECT * FROM Productos where  NombreProducto like '%$variableBusqueda%' ;";
        $resultado= mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($resultado)!=0){
        
            return $resultado;
        }
        else
        {
            echo "<p class='titulosPrincipal'>No se han encontrado productos con ese nombre &nbsp;:(</p>";
            
        }
    }
    // ESTA CONSULTA SE USA PARA LISTAR LOS PRODUCTOS EN LA TABLA Productos
    function listarProductos($conexion){
        $consulta = "Select * from Productos;";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA LISTAR LAS CATEGORIAS EN LA TABLA Categorias
    function listarCategorias($conexion){
        $consulta = "Select * from Categorias;";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS POR EL ID EN LA TABLA Productos
    function buscarProductoPorID($conexion, $idProducto){
        $consulta = "Select * from Productos where idProducto='$idProducto'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR UNA CATEGORIA POR ID
    function buscarCategoriaPorID($conexion, $idCategoria){
        $consulta = "Select * from Categorias where idCategoria='$idCategoria'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR EL PRODUCTO POR ID
    function eliminarProductoPorID($conexion, $idProducto){
        $consulta = "Delete From Productos where idProducto='$idProducto'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS POR EL NOMBRE
    function buscarProductoPorNombre($conexion, $nombre){
        $consulta = "Select * From Productos where NombreProducto='$nombre'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }


    // ESTA CONSULTA SE USA PARA INSERTAR UN NUEVO PRODUCTO
    function insertarNuevoProducto($conexion, $nombre, $categoria, $descripcion, $precio, $stock,  $imagenProducto ){
        $consulta = "INSERT INTO Productos (idCategoria, NombreProducto, DetallesProducto, Precio, Stock, Imagen) VALUES ('$categoria', '$nombre', '$descripcion', '$precio', '$stock', '$imagenProducto');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR UNA CATEGORÍA POR ID
    function eliminarCategoriaPorID($conexion, $idCategoria){
        $consulta = "DELETE FROM Categorias WHERE idCategoria = '$idCategoria'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS EN EL PANEL DE ADMINISTRACION(BARRA BUSQUEDA)
    function busquedaProductosAdmin($conexion, $variableBusqueda){
        $consulta = "SELECT * FROM Productos where idProducto like '%$variableBusqueda%' 
        or idCategoria like '%$variableBusqueda%'
        or NombreProducto like '%$variableBusqueda%'
        or Precio like '%$variableBusqueda%'
        or Stock like '%$variableBusqueda%';";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($resultado)!=0){
        
            return $resultado;
        }
        else
        {
            echo "<tr><td class='text-center'>No se han encontrado productos con ese nombre &nbsp;:(</td></tr>";
            
        }
    }
    // ESTA CONSULTA SE USA PARA BUSCAR CATEGORIAS EN EL PANEL DE ADMINISTRACION(BARRA BUSQUEDA)
    function busquedaCategoriasAdmin($conexion, $variableBusqueda){
        $consulta = "SELECT * FROM Categorias where idCategoria like '%$variableBusqueda%' 
        or NombreCategoria like '%$variableBusqueda%'
        or DescripcionCategoria like '%$variableBusqueda%';";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        if(mysqli_num_rows($resultado)!=0){
        
            return $resultado;
        }
        else
        {
            echo "<tr><td class='text-center'>No se han encontrado categorías con ese nombre &nbsp;:(</td></tr>";
            
        }
    }
    // ESTA CONSULTA SE USA PARA COMPROBAR EL NOMBRE DE UNA CATEGORIA
    function comprobarNombreCategoria($conexion, $nombre){
        $consulta = "SELECT * FROM Categorias where NombreCategoria='$nombre'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA INSERTAR NUEVA CATEGORIA
    function insertarNuevaCategoria($conexion, $nombre, $descripcion, $logo){
        $consulta = "INSERT INTO Categorias (NombreCategoria, DescripcionCategoria, LogoCategoria) VALUES ('$nombre', '$descripcion', '$logo');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR UN PRODUCTO SI LA IMAGEN ES NULA
    function modificarSinImagenProducto($conexion,$idProducto, $nombre, $categoria, $descripcion, $precio, $stock){
        $consulta = "UPDATE Productos SET idCategoria = '$categoria', NombreProducto = '$nombre', DetallesProducto = '$descripcion', Precio = '$precio', Stock = '$stock' WHERE (idProducto = '$idProducto');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR UN PRODUCTO 
    function modificarProducto($conexion, $idProducto, $nombre, $categoria, $descripcion, $precio, $stock, $imagenProducto){
        $consulta = " UPDATE Productos SET idCategoria = '$categoria', NombreProducto = '$nombre', DetallesProducto = '$descripcion', Precio = '$precio', Stock = '$stock', Imagen = '$imagenProducto' WHERE idProducto = '$idProducto'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR UNA CATEGORIA SI LA IMAGEN ES NULA
    function modificarCategoriaSinLogo($conexion, $nombre, $descripcion, $idCategoria){
        $consulta = "UPDATE Categorias SET NombreCategoria = '$nombre', DescripcionCategoria = '$descripcion' WHERE (idCategoria = '$idCategoria');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR UNA CATEGORIA 
    function modificarCategoriaLogo($conexion, $nombre, $descripcion, $logo, $idCategoria){
        $consulta = "UPDATE Categorias SET NombreCategoria = '$nombre', DescripcionCategoria = '$descripcion', LogoCategoria = '$logo' WHERE (idCategoria = '$idCategoria');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS EN LA TABLA ProductosCarrito
    function buscarProductosEnElCarrito($conexion, $idProducto){
        $consulta = "SELECT * FROM ProductosCarrito;";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    } 
    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS EN LA TABLA ProductosCarrito
    function buscarProductosEnElCarrito2($conexion, $idProducto, $idCesta){
        $consulta = "SELECT * FROM ProductosCarrito where idProductoCarrito='$idProducto' and idCesta='$idCesta';";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    } 

    // ESTA CONSULTA SE USA PARA ACTUALIZAR LA CANTIDAD DE UN PRODUCTO EN EL CARRITO
    function actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidad){
        $consulta = "UPDATE ProductosCarrito SET Cantidad = '$cantidad'+1 WHERE (idItem = '$idItem');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA SUMAR 1 LA CANTIDAD DE UN PRODUCTO EN EL CARRITO
    function SumarCantidadProductosEnElCarrito($conexion, $idItem){
        $consulta = "UPDATE ProductosCarrito SET Cantidad = Cantidad+1 WHERE (idItem = '$idItem');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA RESTAR 1 LA CANTIDAD DE UN PRODUCTO EN EL CARRITO
    function RestarCantidadProductosEnElCarrito($conexion, $idItem){
        $consulta = "UPDATE ProductosCarrito SET Cantidad = Cantidad-1 WHERE (idItem = '$idItem');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR EL STOCK DE UN PRODUCTO
    function actualizarStockProductos($conexion, $idProducto, $stock){
        $consulta = "UPDATE Productos SET Stock = '$stock' WHERE (idProducto = '$idProducto');";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }

    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS EN LA TABLA ProductosCarrito
    function  buscarProductosParaPagar($conexion,$idCesta){
        $consulta = "SELECT * FROM ProductosCarrito WHERE (idCesta = '$idCesta')";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR EL STOCK AL PAGAR
    function eliminarStockCarrito($conexion,$stock,$idProducto){
        $consulta = "UPDATE Productos SET Stock = Stock-'$stock' WHERE (idProducto = '$idProducto')";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR PRODUCTOS RANDOM EN LA TABLA PRODUCTOS
    function buscarProductosRandom($conexion){
        $consulta = "SELECT DISTINCT * FROM Productos   order by rand() Limit 6 ;";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    
    // ESTA CONSULTA SE USA PARA INSERTAR LA VALORACION MEDIA EN ELA TABLA Productos
    function insertarValoracionMedia($conexion, $idProducto, $valoracionMedia){
        $consulta = "UPDATE Productos SET ValoracionMedia = '$valoracionMedia' WHERE (idProducto = '$idProducto');";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA SELECCIONAR PRODUCTOS CON LA MAYOR VALORACION
    function productosDetacados($conexion){
        $consulta = "SELECT * FROM Productos Order BY ValoracionMedia DESC LIMIT 5;";
        $resultado= mysqli_query($conexion,$consulta);
        return $resultado;
    }

?>