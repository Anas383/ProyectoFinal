<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $estrellas=$_POST['valoracion'];
    $idProducto=$_POST['idProducto'];
    $idUsuario=$_POST['idUsuario'];
    // EN LA SIGUIENTE CONSULTA COMPROBAMOS SI UN USUARIO YA HA METIDO UNA VALORACION
    $buscarSiExisteValoracion=mostrarValoracion($conexion, $idProducto, $idUsuario);
    $mostrarDatosValoracion=mysqli_fetch_assoc($buscarSiExisteValoracion);
    $idValoracionEstrellas=$mostrarDatosValoracion['idValoracionEstrellas'];
    //SI EL USUARIO YA HABIA HECHO UNA VALORACION DE ESE PRODUCTO
    if(mysqli_num_rows($buscarSiExisteValoracion)!=0){
        // ACTUALIZAMOS LA VALORACION
        $actualizar=actualizarValoracion($conexion, $idValoracionEstrellas, $estrellas);
    
        
    }
    // SI NO HABIA HECHO UNA VALORACION DE ESE PRODUCTO
    else{
        // INSERTAMOS UNA NUEVA VALORACION
        $insertar=insertarValoracion($conexion, $idProducto, $idUsuario, $estrellas);

    }

?>