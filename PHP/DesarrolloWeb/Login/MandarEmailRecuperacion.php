<?php
 use PHPMailer\PHPMailer\PHPMailer;

 if (isset($_POST['email'])) {
     $name = "AnimeTEK";
     $email = $_POST['email'];
     $subject = "Recupera tu password AnimeTEK";
     $texto= "aquí";
     $url="http://35.181.48.125/ProyectoAnimeTEK/PHP/DesarrolloWeb/Login/RenovarPassword.php";
     $body ="Pulsa "."<a href='$url'>$texto</a>"." para cambiar tu contraseña.";

     require_once "PHPMailer/PHPMailer.php";
     require_once "PHPMailer/SMTP.php";
     require_once "PHPMailer/Exception.php";

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
         header('Location: Login.php');
     } else {
        echo "No";
         
     }

     
 }

?>