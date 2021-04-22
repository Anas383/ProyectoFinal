
<?php

//Lo primero es importar el archivo para conectarnos a la BD y luego el archivo con el que realizaremos 
//Las consultas

require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';

//Ahora toca recoger los datos introducidos por el usuario en el html
$usuario= $_POST['usuario'];
$password = $_POST['password'];

//Hacemos la conexion a la base de datos de AWS

$conexion=conectar(true);

//Iniciamos la sesion

session_start();

//Realizamos la consulta y comparamos si el usuario y la contraseña

$buscarUsuario= buscarUsuarioLogin($conexion,$usuario,$password);



if(mysqli_num_rows($buscarUsuario)!=0){
    $fila=mysqli_fetch_assoc($buscarUsuario);
    //CREAMOS LA SESION
    crearSesion($fila);

    header('Location: ../InterfazWeb/Home.php');

}
else{
    
    $buscarUsuario2= consultaBuscarUsuario($conexion,$usuario);
       if(mysqli_num_rows($buscarUsuario2)!=0){

        header('Location: Login.php?error=ContraseñaIncorrecta');
        
       }else{
     
        header('Location: Login.php?error=usuarioNoEncontrado');
       }
   
}
?>
