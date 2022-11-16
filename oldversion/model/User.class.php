<?php 
include "autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class User{


    public static function register($uName,	$lName,	$userName,	$uMail,	$uNumber,	$uPass){
        $date =  date("D d/m/Y");
        $days =  date("d");
        $check = User::check($uMail,$userName);
        
       if($check == ""):
            $cmd = "INSERT INTO usuarios(uName,	lName,	userName,	uMail,	uNumber,	uPass,	rDate,days,status)
                                VALUES(?,?,?,?,?,?,?,?,?)";
            $cmd = Conn::conect() -> prepare($cmd);
            $done = $cmd -> execute(
                array( 
                    $uName,	$lName,	$userName,	$uMail,	$uNumber,password_hash($uPass,PASSWORD_DEFAULT),$date,$days,true
                )
            );                       
            return $done?true:false;
        else:

            if($check['uMail'] == $uMail):
                return "m";
            else:
                if($check['userName'] == $userName):
                    return "u";
                endif;
            endif;

        endif;
    }



    public static function getUser($id){
        $cmd = "SELECT * FROM usuarios WHERE user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array(
            $id
        ));

        $done = $cmd -> fetch();
        return $done;
    }

    public static function accessControl($id,$status){
        $cmd = "UPDATE usuarios SET status = ? WHERE user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $done = $cmd -> execute(array(
           $status,$id
        ));

        return $done;
    }

    public static function check($uMail,$userName ){
        $cmd = "SELECT * FROM usuarios WHERE uMail = ? OR userName = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array(
            $uMail,$userName
        ));

        $done = $cmd -> fetch();
        return $done;
    }

    public static function session($userName, $pass){

        $check = User::check($uMail = "",$userName );
        if($check != ""):
            $cmd = "SELECT * FROM usuarios WHERE userName = ?";
            $cmd = Conn::conect() -> prepare($cmd);
            $cmd -> execute(array(
                $userName
            ));
            $done = $cmd -> fetch();
            $checkPass = password_verify($pass,$done['uPass']);

            if($checkPass == true):
                session_start();
                $_SESSION['user'] = $done;
 
                return true;
            else:
                return false;
            endif;
        else:
            return "u";
        endif;

    }

    public static function checkSessionStatusLogin(){
        if(isset($_SESSION['user'])) header("Location: /");
    }

    public static function recoverPass($rMail){
      
        $check  = User::check($rMail, $userName = "");
        $action = "pass";
        $subject = "Recuperacion de contrasena";
        include "../views/mail/mailBody.php";
        $body = $html;
        $exist = "";
        if($check != ""):
         
           $exist = User::mailer($rMail,$check['uName'],$subject,$body,$alt = "");

        else: 
            $exist = false;
        endif;
        return  $exist;


    }

    public static function newPass($pass){
        if(session_status() != 2)session_start();
        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $mail = $_SESSION['recoverMail'];
        $cmd = "UPDATE usuarios SET uPass = ? WHERE uMail = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $done = $cmd -> execute(
            array($pass,$mail)
        );
        if($done) $_SESSION['recoverMail'] = false;
        return $done;
    }

    public static function mailer($uMail,$userName,$subject,$body,$alt = ""){ // usada para enviar correos  a los usuarios
        include "../vendor/autoload.php";
        $mail = new PHPMailer(true);
        try{
            //$mail   -> SMTPDebug = SMTP::DEBUG_SERVER;
            $mail   -> isSMTP();
            $mail   -> Host =      "smtp.hostinger.com";
            $mail   ->SMTPAuth   = true; 
            $mail   ->Username = "mail@dotsell.website";
            $mail   -> Password = "Encarnacion132603@mail";
            $mail   ->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
            $mail   -> Port = 465 ;
            //receptores
            $mail -> setFrom("mail@dotsell.website","Michael Encarnacion");
            $mail -> addAddress($uMail,$userName);
            

            //Contenido
            $mail -> isHTML(true);
            $mail -> Subject = $subject;
            $mail -> Body = $body;
            
            return $mail->send();
         

        }catch(Exception  $e){
            return false;
        }

    }


    public static function checkSessionStatus(){
         
        if(!isset($_SESSION['user'])) header("Location: login");
       
        
    }
    public static function settings($amount_arriers,$daysToArriers,$notification,$user_id){
        $cmd = "UPDATE usuarios SET amount_arriers = ?, daysToArriers = ? , notification = ? WHERE user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $done = $cmd -> execute(array(
            $amount_arriers,$daysToArriers,$notification,$user_id
        ));
        $_SESSION['user']['amount_arriers'] = $amount_arriers;
        $_SESSION['user']['daysToArriers'] = $daysToArriers;
        $_SESSION['user']['notification'] = $notification;
        return $done;
    }

    public static function editLogo($logo){
        session_start();
        $user_id = $_SESSION['user']['user_id'];
        $name = "logo_".$_SESSION['user']['user_id'].".png";
        $type = $logo['type'];
        $fileUri = $logo['tmp_name'];
        if($type !== 'image/png' && $type !== 'image/jpeg' && $type !== 'image/jpg'):
            //error 2: imagen no compatible
            return $type;
        endif;

        if(move_uploaded_file($fileUri,"../src/loaded_photo/".$name)):
            $cmd = "UPDATE usuarios SET logo = ? WHERE user_id = ?";
            $cmd = Conn::conect() -> prepare($cmd);
            $done = $cmd -> execute(array(
              $name,$user_id
            ));
            $_SESSION['user']['logo'] = $name;
            return $done;
        endif;
      
    }


  
}

