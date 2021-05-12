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
function consultaBuscarUsuarioID($conexion,$idUsuario){
    $consulta = "Select * from Usuarios WHERE  idUsuario = '$idUsuario'";
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
function editarPerfil($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil){
    //INGRESAMOS LOS DATOS DEL USUARIO
    $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni', FotoPerfil = '$fotoPerfil' WHERE idUsuario = '$idUsuario'";
     //EJECUTAMOS LA CONSULTA
     $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}
function editarPerfilSinImagen($conexion,$idUsuario, $usuario, $password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni){
    //INGRESAMOS LOS DATOS DEL USUARIO
    $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni' WHERE idUsuario = '$idUsuario'";
     //EJECUTAMOS LA CONSULTA
     $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}


function modificarUsuario($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $rol, $fotoPerfil){
    //INGRESAMOS LOS DATOS DEL USUARIO
    $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni', ROL = '$rol', FotoPerfil = '$fotoPerfil' WHERE idUsuario = '$idUsuario'";
     //EJECUTAMOS LA CONSULTA
     $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}
function modificarUsuarioSinImagen($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $rol){
    //INGRESAMOS LOS DATOS DEL USUARIO
    $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni', ROL = '$rol' WHERE idUsuario = '$idUsuario'";
     //EJECUTAMOS LA CONSULTA
     $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}

function registrarUsuarioCarrito($conexion,$idCarrito, $idUsuario){
    //INGRESAMOS LOS DATOS DEL USUARIO
  
     //EJECUTAMOS LA CONSULTA
     $consulta = "INSERT INTO Carrito (idCarrito, idUsuario, PrecioTotal) VALUES ('$idCarrito', '$idUsuario', 0.00)";
    $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}


function listarUsuarios($conexion){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "Select * from Usuarios";
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
function eliminarCarro($conexion, $idUsuario){
     $consulta = "DELETE FROM Carrito WHERE idCarrito = '$idUsuario' ";
    $resultado = mysqli_query($conexion,$consulta);
     return $resultado;
    
}

function darseDeBaja($conexion, $idUsuario){
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
function actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "UPDATE Usuarios SET `FotoPerfil` = '$fotoPerfil' WHERE (`idUsuario` = '$idUsuario')";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function busquedUsuariosAdmin($conexion, $variableBusqueda){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "SELECT * FROM Usuarios where idUsuario like '%$variableBusqueda%' 
    or Usuario like '%$variableBusqueda%'
    or Nombre like '%$variableBusqueda%'
    or PrimerApellido like '%$variableBusqueda%'
    or SegundoApellido like '%$variableBusqueda%'
    or Telefono like '%$variableBusqueda%'
    or Email like '%$variableBusqueda%'
    or DNI like '%$variableBusqueda%'
    or ROL like '%$variableBusqueda%';";
    //EJECUTAMOS LA CONSULTA
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}


function BuscarUsuarioDomicilio($conexion,$idUsuario){
    $consulta = "Select * from Domicilio WHERE  idUsuarioCF = '$idUsuario'";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function buscarDomicilioID($conexion,$idDireccion){
    $consulta = "Select * from Domicilio WHERE  idDomicilio = '$idDireccion'";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function insertarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero,  $cp ){
    $consulta = "INSERT INTO Domicilio (`idUsuarioCF`, `Provincia`, `ComunidadAutonoma`, `Calle`, `Numero`, `CP`) VALUES ('$idUsuario', '$provincia', '$comunidadAutonoma', '$calle', '$numero', '$cp')";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function modificarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero, $piso, $cp ,$portal){
    $consulta = "UPDATE Domicilio SET Provincia = '$provincia', ComunidadAutonoma = '$comunidadAutonoma', Calle = '$calle', Numero = '$numero', Piso = '$piso', CP = '$cp', Portal = '$portal' WHERE (idUsuarioCF = '$idUsuario');";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}

function listarDirecciones($conexion ){
    $consulta = "SELECT * FROM Domicilio";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}
function eliminarDireccion($conexion, $idDireccion){
    $consulta = "DELETE FROM Domicilio WHERE (idDomicilio = '$idDireccion')";
    $resultado = mysqli_query($conexion,$consulta);
    return $resultado;
}


function busquedDireccionesAdmin($conexion, $variableBusqueda){
    //BUSCAMOS SI EXISTE EL USUARIO
    $consulta = "SELECT  Domicilio. idDomicilio, idUsuarioCF, Provincia, ComunidadAutonoma, Calle, Numero, Piso, Portal, CP, Usuarios.Usuario  FROM Domicilio, Usuarios  
    where idDomicilio like '%$variableBusqueda%' 
    or idUsuarioCF like '%$variableBusqueda%' 
    or Provincia like '%$variableBusqueda%'
    or ComunidadAutonoma like '%$variableBusqueda%'
    or Calle like '%$variableBusqueda%'
    or Numero like '%$variableBusqueda%'
    or CP like '%$variableBusqueda%' 
    or Piso like '%$variableBusqueda%'
    or Portal like '%$variableBusqueda%' 
    or Usuario like '%$variableBusqueda%' ;";
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