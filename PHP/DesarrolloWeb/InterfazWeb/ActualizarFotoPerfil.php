<?php

    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOs DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);

    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP 
    $fotoPerfil = addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));
    $idUsuario = $_GET['idUsuario'];


    // REALIZAMOS LA CONSULTA PARA ACTUALIZAR LA FOTO DE PERFIL
    $actualizarFotoPerfil= actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario);
    //REDIRIGIMOS AL PERFIL DE NUEVO
    header("Location: Perfil.php");

?>

