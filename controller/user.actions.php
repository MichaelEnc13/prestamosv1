<?php
  include !file_exists("../model/autoload.php")?"model/autoload.php": "../model/autoload.php";
    if(isset($_POST['register']) ):
      echo  User::register
            (
              $_POST['uName'],
              $_POST['lName'],
              $_POST['userName'],
              $_POST['uMail'],
              $_POST['uNumber'],
              $_POST['uPass']
            );
    endif;
    if(isset($_GET['login']) ):
        
        $login = User::session( $_GET['userName'],$_GET['uPass']);

            if($login == true):
                echo "./";
            else:
              echo $login;
            endif;

 
    endif;
    if(isset($_GET['recover']) ):
        
      echo  $recover = User::recoverPass($_GET['mail']);
    
    endif;
    if(isset($_GET['changePass']) ):
        
      echo  User::newPass($_GET['pass']);
    
    endif;
 
    if(isset($_GET['logout']) ):
        session_start();
        $_SESSION = array();
        if(session_destroy())echo "./"; 
        
    endif;

    if(isset($_GET['changeSetting']) ):

      session_start();
      echo User::settings(
        $_GET['amount_arriers'],
        $_GET['daysToArriers'],
     
        $_GET['notification'],
        $_SESSION['user']['user_id']
      
      ); 

    endif;


    if(isset($_POST['editLogo']) ):

      echo User::editLogo($_FILES['logo']);
 
 
    endif;

    if(isset($_GET['getData'])):
      $uid = base64_decode(base64_decode($_GET['uid']));
      $data =  User::getUser($uid);
      $json = array(
          "amount" => $data['payAmount'],
          "userId" => $data['user_id']
    
      );
        
      echo json_encode($json);
    endif;

    if(isset($_GET['access'])):
      //retorna el acceso 
      session_start();
      echo User::accessControl($_SESSION['user']['user_id'],true);
    endif;



?>
