<?php

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion=conectar(true);
$usuario= $_GET['usuario'];
$password = $_POST['password'];
$buscarUsuario=consultaBuscarUsuario($conexion,$usuario);
echo $usuario;
if(mysqli_num_rows($buscarUsuario)!=0){
    $fila=mysqli_fetch_assoc($buscarUsuario);
    $idUsuario= $fila['idUsuario'];
    cambiarPassword($conexion,$idUsuario, $password);

    header('Location: Login.php?accion=passwordCambiada');

}
else{
    
    $buscarUsuario2= consultaBuscarUsuario($conexion,$usuario);
       if(mysqli_num_rows($buscarUsuario2)!=0){

        header('Location: NuevaPassword.php?error=ContraseñaIncorrecta');
        
       }else{
     
        header('Location: NuevaPassword.php?error=usuarioNoEncontrado');
       }
   
}


?>