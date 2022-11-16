<?php


 require "mail/PHPMailer.php";
 require "mail/Exception.php";
 require "mail/SMTP.php";
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
if (isset($_POST['recover'])) {
    
require "conn.php";
$cmd = "SELECT * FROM usuarios WHERE mail = ?";
$pre_cmd = $conn->prepare($cmd);
$pre_cmd-> execute(array($_POST['mail']));
$datos = $pre_cmd -> fetch();




$address = $_POST['mail'];

 $mail = new PHPMailer();

 $mail -> isSMTP();
 $mail -> Host = "mail.wellsolutions.me";
 $mail -> Port = 587;
 $mail -> SMTPSecure = "tls";
 $mail -> SMTPAuth = true;
 $mail -> Username = "soporte@wellsolutions.me";
 $mail -> Password = "Encarnacion132603";
 $mail -> setFrom("soporte@wellsolutions.me", "WellSolutions");
 $mail -> addAddress($address);
 $mail -> Subject ="Recuperar contraseña";
 $mail -> msgHTML(
   //  "Hola <strong> ".$datos['fname']."</strong> tu contraseña es: ".$datos['pass']
     
    "
      
     <html>
        <body>
            
           
             
            <div  style=\" background-color:#f2f2f2; width:400px;border-radius:5px;box-shadow:1px 1px 3px #b3b3b3;padding:10px;color:#595959;text-align:center;\">
                <h2 style=\"text-align:inherit;\">Hola, ".$datos['fname']."</h2>
                <br><br><br>
                <p class=\"msg\" style=\" font-size:20px;text-align:center; color:  #595959;\">Tu usuario  es: <strong>".$datos['user']."</strong> </p> 
                <p class=\"msg\" style=\" font-size:20px;text-align:center; color:  #595959;\">Tu contraseña es: <strong>".$datos['pass']."</strong> </p> 
                <a href=\"https://wellsolutions.me/login\" style=\"margin:auto;background-color: #c4001d; color:white; width:40%; padding:10px 8px; border-radius:5px; margin-top:10px;\">Iniciar sesión</a>
            </div> 
        </body>
    </html>  
     "
     
     
     );

    if (!$mail -> send()) {
       echo $mail -> ErrorInfo;
    }else
    {
        header("location:recovery?d");
    }

}



?>


