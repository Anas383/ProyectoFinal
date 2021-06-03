<?php
    // ESTA CONSULTA SE USA PARA COMPROBAR EL USUARIO Y LA CONTRASEÑA
    function buscarUsuarioLogin($conexion,$usuario,$password){
        //COMPARAMOS LOS DATOS DEL USUARIO
        $consulta =  "Select * from Usuarios WHERE  Usuario = '$usuario' AND Password = '$password' ";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA COMPROBAR EL USUARIO 
    function consultaBuscarUsuario($conexion,$usuario){
        $consulta = "Select * from Usuarios WHERE  Usuario = '$usuario'";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA CAMBIAR LA CONTRASEÑA
    function cambiarPassword($conexion,$idUsuario, $password){
        $consulta = "UPDATE Usuarios SET Password = '$password' WHERE (idUsuario = '$idUsuario');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL USUARIO POR idUsuario
    function consultaBuscarUsuarioID($conexion,$idUsuario){
        $consulta = "Select * from Usuarios WHERE  idUsuario = '$idUsuario'";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL TELEFONO
    function buscarTelefono($conexion,$telefono){
        //BUSCAMOS SI EXISTE EL TELEFONO
        $consulta = "Select * from Usuarios WHERE  Telefono = '$telefono'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL EMAIL
    function buscarEmail($conexion,$email){
        //BUSCAMOS SI EXISTE EL EMAIL
        $consulta = "Select * from Usuarios WHERE  Email = '$email'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL USUARIO POR EL EMAIL Y EL USUARIO
    function buscarEmailRecoverPassword($conexion,$email, $usuario){
        //BUSCAMOS SI EXISTE EL EMAIL
        $consulta = "Select * from Usuarios WHERE  Email = '$email' and Usuario='$usuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL USUARIO POR EL DNI Y EL USUARIO
    function consultaBuscarDNIRecoverPassword($conexion,$dni, $usuario){
        $consulta = "Select * from Usuarios WHERE  DNI = '$dni' and Usuario='$usuario'";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL DNI
    function consultaBuscarDNI($conexion,$dni){
        $consulta = "Select * from Usuarios WHERE  DNI = '$dni'";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA REGISTAR A UN USUARIO
    function registrarUsuario($conexion,$usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil){
        $consulta = "INSERT INTO Usuarios (Usuario, Password, Nombre, PrimerApellido, SegundoApellido, Telefono, Email, DNI,Rol, FotoPerfil) VALUES ('$usuario', '$password', '$nombre', '$apellido1', '$apellido2', '$telefono', '$email','$dni', 'Usuario','$fotoPerfil')";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR LOS DATOS DE UN USUARIO
    function editarPerfil($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $fotoPerfil){
        $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni', FotoPerfil = '$fotoPerfil' WHERE idUsuario = '$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR LOS DATOS DE UN USUARIO SI LA IMAGEN ES NULL
    function editarPerfilSinImagen($conexion,$idUsuario, $usuario, $password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni){
        $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni' WHERE idUsuario = '$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }

    // ESTA CONSULTA SE USA PARA MODIFICAR LOS DATOS DE UN USUARIO ADMIN
    function modificarUsuario($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $rol, $fotoPerfil){
        $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni', ROL = '$rol', FotoPerfil = '$fotoPerfil' WHERE idUsuario = '$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR LOS DATOS DE UN USUARIO SI LA IMAGEN ES NULL ADMIN
    function modificarUsuarioSinImagen($conexion,$idUsuario, $usuario,$password, $nombre,$apellido1, $apellido2,$telefono, $email, $dni, $rol){
        $consulta = "UPDATE Usuarios SET Usuario = '$usuario', Nombre = '$nombre', PrimerApellido = '$apellido1', SegundoApellido = '$apellido2', Telefono = '$telefono', Password = '$password', Email = '$email', DNI = '$dni', ROL = '$rol' WHERE idUsuario = '$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }
    // ESTA CONSULTA SE USA PARA REGISTRAR UN NUEVO CARRITO AL REGISTRARSE EL USUARIO
    function registrarUsuarioCarrito($conexion,$idCarrito, $idUsuario){
        $consulta = "INSERT INTO Carrito (idCarrito, idUsuario, PrecioTotal) VALUES ('$idCarrito', '$idUsuario', 0.00)";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }

    // ESTA CONSULTA SE USA PARA LISTAR USUARIOS 
    function listarUsuarios($conexion){
        $consulta = "Select * from Usuarios";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR A UN USUARIO
    function eliminarUsuario($conexion, $idUsuario){
        $consulta = "DELETE FROM Usuarios WHERE idUsuario = '$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR UN CARRITO
    function eliminarCarro($conexion, $idUsuario){
        $consulta = "DELETE FROM Carrito WHERE idCarrito = '$idUsuario' ";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
        
    }
    // ESTA CONSULTA SE USA PARA QUE UN USUARIO SE DÉ, DE BAJA
    function darseDeBaja($conexion, $idUsuario){
        $consulta = "DELETE FROM Usuarios WHERE idUsuario = '$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA LISTAR USUARIOS SEGUN EL ID
    function listarUsuariosId($conexion, $idUsuario){
        $consulta = "Select * from Usuarios where idUsuario='$idUsuario'";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
     // ESTA CONSULTA SE USA PARA QUE UN USUARIO ACTUALICE SU FOTO DE PERFIL
    function actualizarFotoPerfil($conexion, $fotoPerfil, $idUsuario){
        $consulta = "UPDATE Usuarios SET `FotoPerfil` = '$fotoPerfil' WHERE (`idUsuario` = '$idUsuario')";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
     // ESTA CONSULTA SE USA PARA BUSCAR USUARIOS EN EL PANEL DE ADMINISTRACION
    function busquedUsuariosAdmin($conexion, $variableBusqueda){
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
    
        if(mysqli_num_rows($resultado)!=0){
        
            return $resultado;
        }
        else
        {
            echo "<tr><td class='text-center'>&nbsp;Usuario no encontrado &nbsp;:(</td></tr>";
            
        }
    }

    // ESTA CONSULTA SE USA PARA BUSCAR EL DOMICILIO DE UN USUARIO MEDIANTE EL idUsuario
    function BuscarUsuarioDomicilio($conexion,$idUsuario){
        $consulta = "Select * from Domicilio WHERE  idUsuarioCF = '$idUsuario'";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA BUSCAR EL DOMICILIO 
    function buscarDomicilioID($conexion,$idDireccion){
        $consulta = "Select * from Domicilio WHERE  idDomicilio = '$idDireccion'";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA INSERTAR UN DOMICILIO DE UN USUARIO 
    function insertarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero,  $cp ){
        $consulta = "INSERT INTO Domicilio (`idUsuarioCF`, `Provincia`, `ComunidadAutonoma`, `Calle`, `Numero`, `CP`) VALUES ('$idUsuario', '$provincia', '$comunidadAutonoma', '$calle', '$numero', '$cp')";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MODIFICAR EL DOMICILIO DE UN USUARIO
    function modificarDomicilioUsuario($conexion,$idUsuario, $provincia, $comunidadAutonoma, $calle, $numero, $piso, $cp ,$portal){
        $consulta = "UPDATE Domicilio SET Provincia = '$provincia', ComunidadAutonoma = '$comunidadAutonoma', Calle = '$calle', Numero = '$numero', Piso = '$piso', CP = '$cp', Portal = '$portal' WHERE (idUsuarioCF = '$idUsuario');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA LISTAR LOS DOMICILIOS
    function listarDirecciones($conexion ){
        $consulta = "SELECT * FROM Domicilio";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR UN DOMICILIO 
    function eliminarDireccion($conexion, $idDireccion){
        $consulta = "DELETE FROM Domicilio WHERE (idDomicilio = '$idDireccion')";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }

    // ESTA CONSULTA SE USA PARA BUSCAR UN DOMICILIO, BARRA DE BUSQUEDA ADMIN
    function busquedDireccionesAdmin($conexion, $variableBusqueda){
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
    // ESTA CONSULTA SE USA PARA ENVIAR COMENTARIOS
    function enviarComentarios($conexion, $comentario, $idUsuario, $idProducto, $usuario ){
        $consulta = "INSERT INTO ValoracionesComentarios (Comentario, idUsuario_VC, idProducto_VC, Usuario) VALUES ('$comentario', '$idUsuario', '$idProducto', '$usuario');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ELIMINAR COMENTARIOS
    function eliminarComentarios($conexion, $idComentario ){
        $consulta = "DELETE FROM ValoracionesComentarios WHERE (idValoracionesComentarios = '$idComentario');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA EDITAR COMENTARIOS
    function editarComentarios($conexion, $idComentario, $comentario){
        $consulta = "UPDATE `TiendaMerchandising`.`ValoracionesComentarios` SET `Comentario` = '$comentario' WHERE (`idValoracionesComentarios` = '$idComentario');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MOSTRAR COMENTARIOS
    function mostrarComentariosComentarios($conexion, $idProducto){
        $consulta = "SELECT * FROM ValoracionesComentarios WHERE idProducto_VC = '$idProducto';";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA MOSTRAR LA VALORACION
    function mostrarValoracion($conexion, $idProducto, $idUsuario){
        $consulta = "SELECT * FROM  ValoracionEstrellas where idProducto_VE='$idProducto' and idUsuario_VE='$idUsuario';";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA INSERTAR LA VALORACION
    function insertarValoracion($conexion, $idProducto, $idUsuario, $estrellas){
        $consulta = "INSERT INTO ValoracionEstrellas (idProducto_VE, idUsuario_VE, Valoracion) VALUES ('$idProducto', '$idUsuario', '$estrellas');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA ACTUALIZAR LA VALORACION
    function actualizarValoracion($conexion, $idValoracionEstrellas, $estrellas){
        $consulta = "UPDATE ValoracionEstrellas SET Valoracion = '$estrellas' WHERE (idValoracionEstrellas = '$idValoracionEstrellas');";
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }
    // ESTA CONSULTA SE USA PARA HACER MEDIA DE LA VALORACION
    function hacerMediaValoracion($conexion,$idProducto){
        $consulta = "SELECT format(AVG(Valoracion),1) FROM ValoracionEstrellas where idProducto_VE= '$idProducto';";
        //EJECUTAMOS LA CONSULTA
        $resultado = mysqli_query($conexion,$consulta);
        return $resultado;
    }

    // ESTA CONSULTA SE USA PARA CREAR LA SESION DE UN USUARIO
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