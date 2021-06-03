<?php
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOUsuarios.php';
    //CONECTAMOS A LA BASE DE DATOS  
    $conexion= conectar(true);
    // USAMOS LA LIBRERIA PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;

    // RECOGEMOS LAS VARIABLES DESDE EL PHP
    $usuario= $_POST['usuario'];
    $email = $_POST['email'];
    $dni=$_POST['dni'];
    // HACEMOS LAS CONSULTAS PARA COMPROBAR SI EXISTEN LOS DATOS
    $buscarUsuario= consultaBuscarUsuario($conexion,$usuario);
    $buscarEmail=buscarEmailRecoverPassword($conexion,$email, $usuario);
    $buscarDNI= consultaBuscarDNIRecoverPassword($conexion,$dni, $usuario);
    // SI ALGUN CAMPO NO EXISTE SE ENVIA UN ERROR
    if(mysqli_num_rows($buscarUsuario)==0){
        header('Location: RecuperarPassword.php?error=usuarioExiste');
    }else if(mysqli_num_rows($buscarEmail)==0){
        header('Location: RecuperarPassword.php?error=emailExiste');
    }else if(mysqli_num_rows($buscarDNI)==0){
        header('Location: RecuperarPassword.php?error=dniExiste');
    }else{
        // SI EXISTEN SE ENVIA EL EMAIL
        $name = "AnimeTEK";
        $subject = "Recupera tu contraseña AnimeTEK";
        $texto= "aquí";
        $url="http://35.181.48.125/ProyectoAnimeTEK/PHP/DesarrolloWeb/Login/NuevaPassword.php?usuario=$usuario";
        $body ="Pulsa "."<a href='$url'>$texto</a>"." para cambiar tu contraseña.";

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $subject = utf8_decode($subject);
        $body = utf8_decode($body);
        $mail = new PHPMailer();

        // CONFIGURACION SMTP 
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "animetek382@gmail.com";
        $mail->Password = 'tgwxswxygxpoanrt';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //CONFIGURACION EMAIL
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            header('Location: Login.php?accion=emailEnviado');
        } else {
        
         
     }
    }
     

     


?>