<?php
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    //CONECTAMOS A LA BASE DE DATOS 
    $conexion=conectar(true);
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $usuario= $_GET['usuario'];
    $password = $_POST['password'];
    // REALIZAMOS LA CONSULTA DE BUSCAR AL USUARIO
    $buscarUsuario=consultaBuscarUsuario($conexion,$usuario);

    if(mysqli_num_rows($buscarUsuario)!=0){
        // SI EXISTE CAMBIAMOS LA CONTRASEÑA
        $fila=mysqli_fetch_assoc($buscarUsuario);
        $idUsuario= $fila['idUsuario'];
        cambiarPassword($conexion,$idUsuario, $password);

        header('Location: Login.php?accion=passwordCambiada');

    }
    else{
        //SI NO EXISTE HACEMOS UNA CONSULTA BUSCANDO AL USUARIO 
        $buscarUsuario2= consultaBuscarUsuario($conexion,$usuario);
        if(mysqli_num_rows($buscarUsuario2)!=0){
            // SI  EXISTE EL USUARIO ES QUE LA CONTRASEÑA ES INCORRETA  Y LE MANDAMOS UN ERROR
        header('Location: NuevaPassword.php?error=ContraseñaIncorrecta');
        
        }else{
        // SI NO EXISTE EL USUARIO ES QUE EL USUARIO NO ESTA REGISTRADO Y LE MANDAMOS UN ERROR
        header('Location: NuevaPassword.php?error=usuarioNoEncontrado');
        }

    }


?>