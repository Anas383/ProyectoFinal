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
    $idUsuario=$_SESSION['idUsuario'];
    // EJECUTAMOS LA CONSULTA PARA VACIAR EL CARRITO
    $vaciarCarrito=vaciarCarrito($conexion,$idUsuario);

    header('Location: MostrarCarrito.php');


?>