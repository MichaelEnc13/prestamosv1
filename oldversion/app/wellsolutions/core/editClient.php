<?php

require "conn.php";

if(isset($_POST['save']))
{
    
    
$cmd = "UPDATE clientes SET nombre = ? , apellido = ? ,cedula = ? , celular = ? WHERE id = ? AND userClient = ?";
$pre_cmd = $conn -> prepare($cmd);

$pre_cmd -> execute(
    
    array(
      
        $_POST['fname'],
         $_POST['lname'],
          $_POST['cedula'],
           $_POST['celular'],
              
            base64_decode($_GET['clientID']),
            $_SESSION['userClient']
        
        )
    
    );
    
    if($pre_cmd)
    {
        
        $cmd = "UPDATE deudores SET cedula = ? , celular = ? WHERE cliente_id = ? AND userClient = ?";
        $pre_cmd = $conn -> prepare($cmd);
        
        $pre_cmd -> execute(
            
            array(
              
                
                  $_POST['cedula'],
                   $_POST['celular'],
                      
                    base64_decode($_GET['clientID']),
                    $_SESSION['userClient']
                
                )
            
            );
            
            
              $cmd = "UPDATE historial SET cedula = ?  WHERE cliente_id = ? AND userClient = ?";
                $pre_cmd = $conn -> prepare($cmd);
                
                $pre_cmd -> execute(
                    
                    array(
                      
                        
                          $_POST['cedula'],
                            
                              
                            base64_decode($_GET['clientID']),
                            $_SESSION['userClient']
                        
                        )
                    
                    );
                
        header("location:../client");
        
    }else
    {
        
        $conn = null;
    }

    
    
    
}




?>