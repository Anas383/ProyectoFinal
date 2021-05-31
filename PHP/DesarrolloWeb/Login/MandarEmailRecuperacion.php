<?php
require '../../BD/ConectorBD.php';
require '../../BD/DAOUsuarios.php';
$conexion= conectar(true);
 use PHPMailer\PHPMailer\PHPMailer;

 $usuario= $_POST['usuario'];
 $email = $_POST['email'];
 $dni=$_POST['dni'];
 $buscarUsuario= consultaBuscarUsuario($conexion,$usuario);
 $buscarEmail=buscarEmailRecoverPassword($conexion,$email, $usuario);
 $buscarDNI= consultaBuscarDNIRecoverPassword($conexion,$dni, $usuario) ;
 
    if(mysqli_num_rows($buscarUsuario)==0){
    header('Location: RecuperarPassword.php?error=usuarioExiste');
    }else if(mysqli_num_rows($buscarEmail)==0){
    header('Location: RecuperarPassword.php?error=emailExiste');
    }else if(mysqli_num_rows($buscarDNI)==0){
    header('Location: RecuperarPassword.php?error=dniExiste');
    }else{
        $name = "AnimeTEK";
     $subject = "Recupera tu contraseña AnimeTEK";
     $texto= "aquí";
     $url="http://localhost/ProyectoAnimeTEK/PHP/DesarrolloWeb/Login/NuevaPassword.php?usuario=$usuario";
     $body ="Pulsa "."<a href='$url'>$texto</a>"." para cambiar tu contraseña.";

     require_once "PHPMailer/PHPMailer.php";
     require_once "PHPMailer/SMTP.php";
     require_once "PHPMailer/Exception.php";
     $subject = utf8_decode($subject);
     $body = utf8_decode($body);
     $mail = new PHPMailer();

     //SMTP Settings
     $mail->isSMTP();
     $mail->Host = "smtp.gmail.com";
     $mail->SMTPAuth = true;
     $mail->Username = "animetek382@gmail.com";
     $mail->Password = 'tgwxswxygxpoanrt';
     $mail->Port = 465; //587
     $mail->SMTPSecure = "ssl"; //tls

     //Email Settings
     $mail->isHTML(true);
     $mail->setFrom($email, $name);
     $mail->addAddress($email);
     $mail->Subject = $subject;
     $mail->Body = $body;

     if ($mail->send()) {
         header('Location: Login.php?accion=emailEnviado');
     } else {
        echo "No";
         
     }
    }
     

     


?>