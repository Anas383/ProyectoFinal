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
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $idProducto=$_GET['idProducto'];
    // ELIMINAMOS EL PRODUCTO
    $eliminarProducto=eliminarProductoPorID($conexion, $idProducto);

    header('Location: AdministrarProductos.php');

?>