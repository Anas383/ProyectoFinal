
<?php
     //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS  
    $conexion=conectar(true);

    // RECOGEMOS LAS VARIABLES DESDE EL PHP
    $idItem=$_GET['idItem'];
    $cantidad=$_GET['cantidad'];
    // AQUI CONTROLAMOS SI LA CANTIDAD ES UNO PARA QUE NO HAGA NADA
    if($cantidad==1){
    
    }else{
        // Y SI ES MAYOR QUE 1 QUE RESTE LA CANTIDAD EN 1
        $restarCantidad= RestarCantidadProductosEnElCarrito($conexion, $idItem); 
    }

    header('Location: MostrarCarrito.php');
?>