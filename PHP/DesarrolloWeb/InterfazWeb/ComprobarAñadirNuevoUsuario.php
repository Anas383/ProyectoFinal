<?php

    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    // INICIAMOS SESSION
    session_start();

    //RECOGEMOS LOS CAMPOS DEL PHP
    $usuario= $_POST['usuario'];
    $nombre= $_POST['nombre'];
    $apellido1= $_POST['primerApellido'];
    $apellido2= $_POST['segundoApellido'];
    $telefono=$_POST['telefono'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $dni=$_POST['dni'];
    $fotoPerfil=addslashes(file_get_contents($_FILES['fotoPerfil']['tmp_name']));


    //NOS CONECTAMOS A LA BASE DE DATOS

    $conexion= conectar(true);

    //REALIZAMOS LAS CONSULTAS PARA COMPROBAR LA EXISTENCIA DE LOS CAMPOS
    $buscarUsuario= consultaBuscarUsuario($conexion,$usuario);
    $buscarTelefono= buscarTelefono($conexion,$telefono);
    $buscarEmail= buscarEmail($conexion,$email);
    $buscarDNI= consultaBuscarDNI($conexion,$dni);


    if(mysqli_num_rows($buscarUsuario)!=0){
        header('Location: ComprobarAñadirNuevoUsuario.php?error=usuarioExiste');
    }else if(mysqli_num_rows($buscarTelefono)!=0){
        header('Location: ComprobarAñadirNuevoUsuario.php?error=telefonoExiste');
    }else if(mysqli_num_rows($buscarEmail)!=0){
        header('Location: ComprobarAñadirNuevoUsuario.php?error=emailExiste');
    }else if(mysqli_num_rows($buscarDNI)!=0){
        header('Location: ComprobarAñadirNuevoUsuario.php?error=dniExiste');
    }
    else{
        // SI NO EXISTE INSERTAMOS USUARIO
        $realizarConsulta=registrarUsuario($conexion,$usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil);
        // RECOGEMOS EL ULTIMO ID INTRODUCIDO EN LA BASE DE DATOS
        $ultimoId = mysqli_insert_id($conexion);
        $idCarrito=$ultimoId;
        $idUsuario=$ultimoId;
        // Y REGISTRAMOS UN NUEVO CARRITO, SIENDO EL ID DEL CARRITO EL MISMO QUE EL DEL USUARIO
        $registrarCarrito=registrarUsuarioCarrito($conexion,$idCarrito, $idUsuario);
        
        header('Location:AdministrarUsuarios.php?registrado=usuarioRegistrado');
    }

?>