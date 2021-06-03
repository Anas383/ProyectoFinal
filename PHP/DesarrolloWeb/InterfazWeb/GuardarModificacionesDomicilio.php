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
    // INICIAMOS SESSION
    session_start();
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $cp=$_POST['cp'];
    $provincia=$_POST['provincia'];
    $comunidadAutonoma=$_POST['comunidadAutonoma'];
    $calle=$_POST['calle'];
    $numero=$_POST['numero'];
    $piso=$_POST['piso'];
    $portal=$_POST['portal'];
    $idUsuario=$_POST['idUsuarioCF'];

    // ACTUALIZAMOS EL DOMICILIO
    $actualizarDomicilio=modificarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero, $piso, $cp ,$portal);


    header("Location: AdministrarDirecciones.php");

?>