<?php 

    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS  
    $conexion=conectar(true);
    //INICIAMOS SESSION
    session_start();  
    // RECOGEMOS EL ID DE LA CESTA  
    //PONEMOS ID USUARIO PORQUE ES EL MISMO QUE EL DE CESTA                   
    $idCesta=$_SESSION['idUsuario'];
    //CON LA SIGUIENTE CONSULTA CONTAMOS LAS FILAS DE LA TABLA CUANDO TENGAMOS ESE ID CESTA
    $contarProductos=contarProductos($conexion, $idCesta);
    $totalProductos=mysqli_fetch_assoc($contarProductos);
    // AQUI MOSTRAMOS EL NUMERO PARA RECIBIRLO POR AJAX
    echo($totalProductos['Count(idCesta)']); 
?>