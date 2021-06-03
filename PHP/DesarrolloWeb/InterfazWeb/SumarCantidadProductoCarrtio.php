
<?php
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    //CONECTAMOS A LA BASE DE DATOS
    session_start();

    // RECOGEMOS LAS VARIABLES DESDE EL PHP
    $idCesta=$_SESSION['idUsuario'];
    $idProducto=$_GET['idProducto'];
    $idItem=$_GET['idItem'];
    // BUSCAMOS EL PRODUCTO EN EL CARRITO
    $buscarProductoCarrito=mysqli_fetch_assoc(buscarProductoCarrito($conexion,$idCesta, $idItem));
    // TAMBIEN BUSCAMOS EL PRODUCTO EN LA TABLA PRODUCTOS
    $buscarProducto=mysqli_fetch_assoc(buscarProductoPorID($conexion, $idProducto));
    
    // AQUI MIRAMOS SI LA CANTIDAD SUPERA EL STOCK DEL PRODUCTO 
    if($buscarProductoCarrito['Cantidad']>=$buscarProducto['Stock']){
        header('Location: MostrarCarrito.php?stock=limiteStockAlcanzado');
    }else{
        //EN CASO CONTRARIO QUE SUME 1
        $sumarCantidad= SumarCantidadProductosEnElCarrito($conexion, $idItem);
        header('Location: MostrarCarrito.php');
    }

?>