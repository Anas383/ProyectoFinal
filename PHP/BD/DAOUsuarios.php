<?php

//FUNCIONES PARA INICIAR SESION
function buscarUsuarioLogin($conexion,$usuario,$password){
    //COMPARAMOS LOS DATOS DEL USUARIO
   $consulta =  "Select * from Usuarios WHERE  Usuario = '$usuario' AND Password = '$password' ";
   //EJECUTAMOS LA CONSULTA
   $resultado = mysqli_query($conexion,$consulta);
   return $resultado;
}

function consultaBuscarUsuario($conexion,$usuario){
    $consulta = "Select * from Usuarios WHERE  Usuario = '$usuario'";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function buscarTelefono($conexion,$telefono){
    //BUSCAMOS SI EXISTE EL TELEFONO
    $consulta = "Select * from Usuarios WHERE  Telefono = '$telefono'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function buscarEmail($conexion,$email){
    //BUSCAMOS SI EXISTE EL EMAIL
    $consulta = "Select * from Usuarios WHERE  Email = '$email'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function consultaBuscarDNI($conexion,$dni){
    $consulta = "Select * from Usuarios WHERE  DNI = '$dni'";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function registrarUsuario($conexion,$usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil){
    //INGRESAMOS LOS DATOS DEL USUARIO
    $consulta = "INSERT INTO Usuarios (Usuario, Password, Nombre, PrimerApellido, SegundoApellido, Telefono, Email, DNI,Rol, FotoPerfil) VALUES ('$usuario', '$password', '$nombre', '$apellido1', '$apellido2', '$telefono', '$email','$dni', 'Usuario','$fotoPerfil')";
     //EJECUTAMOS LA CONSULTA
     $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}


function listarUsuarios($conexion){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Usuarios where ROL='Usuario'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function eliminarUsuario($conexion, $idUsuario){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "DELETE FROM Usuarios WHERE idUsuario = '$idUsuario'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}


function listarUsuariosId($conexion, $idUsuario){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Usuarios where idUsuario='$idUsuario'";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function crearSesion($usuario){
    //Asignamos el id
    session_id($usuario['Usuario']);
    //Iniciamos la sesion
    session_start();
    $_SESSION['usuarioConectado']=true;
    //Guardamos los datos en la sesion
    foreach($usuario as $indice=>$valor){
        $_SESSION[$indice] = $valor;
    }
}
?>