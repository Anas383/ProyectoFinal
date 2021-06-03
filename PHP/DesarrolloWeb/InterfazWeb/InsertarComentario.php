<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOs DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    // INICIAMOS SESION
    session_start();
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP/AJAX
    $idProducto=$_POST['idProducto'];
    $idUsuario=$_POST['idUsuario'];
    $comentario=$_POST['comentario'];
    $usuario=$_SESSION['Usuario'];
    // INSERTAMOS EL COMENTARIO CON ESTA CONSULTA EN LA TABLA 
    $enviarComentarios=enviarComentarios($conexion, $comentario, $idUsuario, $idProducto, $usuario);

?>