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
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $total=$_GET['precioTotal'];
    $cp=$_POST['cp'];
    $provincia=$_POST['provincia'];
    $comunidadAutonoma=$_POST['comunidadAutonoma'];
    $calle=$_POST['calle'];
    $numero=$_POST['numero'];
    $piso=$_POST['piso'];
    $portal=$_POST['portal'];
    $idUsuario= $_SESSION['idUsuario'];

    // HACEMOS UNA CONSULTA SI EXISTE EL DOMICILIO O NO
    $buscarDomicilio=BuscarUsuarioDomicilio($conexion,$idUsuario);
    if(mysqli_num_rows($buscarDomicilio)!=0){
        // SI EXISTE LO ACTUALIZAMOS 
        $actualizarDomicilio=modificarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero, $piso, $cp ,$portal);
    }else{
        // SI NO EXISTE INSERTAMOS UNO NUEVO
        $insertarNuevoDomicilio= insertarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero,  $cp );
    }


    header("Location: Pagar.php?precioTotal=$total");

?>