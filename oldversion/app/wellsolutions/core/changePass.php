<?php

require "conn.php";

if(isset($_POST['save']))
{
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);

if(password_verify($_POST['Cpass'] , $pass))
{
    $cmd = "UPDATE usuarios SET pass = ?  WHERE user = ?";
    $pre_cmd = $conn -> prepare($cmd);
    
   $d = $pre_cmd -> execute(
        
        array(
          
                $pass,
                $_SESSION['user']
            
            )
        
        );
        
        if($d)
        {   unset( $_SESSION['user']);
            unset( $_SESSION['userClient']);
            unset( $_SESSION['name']);
            header("location:https://wellsolutions.me");
        }else
            echo "Ha ocurrido un error.";
    
}else
{
   header("location:https://wellsolutions.me/change-pass?noMatch"); 
  
}


    
}


?>