<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS  
    $conexion=conectar(true);
    // INCIAMOS SESION
    session_start();
    //RECOGEMOS EN UNA VARIABLE EL ID DE SESION 
    $idCesta=$_SESSION['idUsuario'];
    // BUSCAMOS LOS PRODUCTOS EN EL CARRITO CUANDO LA ID CESTA SEA LA ANTERIOR
    $buscarProductos=buscarProductosParaPagar($conexion,$idCesta);
    // AQUI HACEMOS UN BUCLE QUE RECORRE TODAS LAS FILAS Y  QUE ELIMINE EL STOCK DE LOS PRODUCTOS 
    while($productos=mysqli_fetch_assoc($buscarProductos)){
        $eliminar=eliminarStockCarrito($conexion,$productos['Cantidad'],$productos['idProductoCarrito']);
    }
    // FINALMENTE CON ESTA CONSULTA VACIAREMOS EL CARRITO
    $vaciarCarrito=vaciarCarrito($conexion,$idCesta);
    header('Location: PagoFinalizado.php');

?>