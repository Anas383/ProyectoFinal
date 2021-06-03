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
    // RECOGEMOS LA VARIABLE ENVIADA POR AJAX
    $idP=$_GET['id'];
    // INICIAMO SESION
    session_start();
    // MOSTRAMOS EL COMENTARIO CUANDO EL ID DEL PRODUCTO SEA EL QUE HEMOS RECIBIDO
    $resultado =  mostrarComentariosComentarios($conexion, $idP);
    // HACEMOS UN ARRAY PARA ALMACENAR EL TEXTO POR JSON
    $json= array();
    // HACEMOS UN WHILE PARA MOSTRAR LOS REGISTROS
    while($mostrar= mysqli_fetch_array($resultado)){
        // CON JSON GUARDAMOS LOS DATOS
        $json[]= array(
            'Comentario' => $mostrar['Comentario'],
            'Nombre' => $mostrar['Usuario'],
            'idUsuario' => $mostrar['idUsuario_VC'],
            'idComentario'=> $mostrar['idValoracionesComentarios'],
            'ROL' => $_SERVER['ROL']
            
        );
    }
    // CON json_encode() DESCIFRAMOS EL ARRAY
    $jsonstring=json_encode($json);
    // LO MOSTRAMOS AQUI PAR RECIBIRLO DE NUEVO POR AJAX
    echo $jsonstring;






?>