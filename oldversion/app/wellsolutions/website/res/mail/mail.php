<?php

require "PHPMailer.php";
require "Exception.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(); //Objeto de la clase PHP mailer




if(isset($_POST['send']))
{
   try {
     //Server settings
    $mail -> isSMTP();
    $mail -> Host = "mail.wellsolutions.me";
    $mail -> Port = 587;
    $mail -> SMTPSecure = "tls";
    $mail -> SMTPAuth = true;
    $mail -> Username ="info@wellsolutions.me";
    $mail -> Password = "Encarnacion132603";

    //Recipients
    $mail -> setFrom($_POST['mail'], $_POST['name']);
    $mail -> addAddress("wellsoporte@gmail.com");
    $mail -> Subject = "Informacion";
    $mail->addReplyTo($_POST['mail'], 'Informacion');
    $mail -> msgHTML ($_POST['mail']." : ".$_POST['name']." : ".$_POST['message']);
     
    

    $mail -> send();
    
    header("location:Contact?done#t");
   
   }
   
   
   catch (\Throwable $th) {

    echo "<p class=\"sent\">No se ha podido enviar tu mensaje".$mail->ErrorInfo. ":(</p>";

   }
    

}


?>

