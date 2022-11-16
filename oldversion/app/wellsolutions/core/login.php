<?php 
include "conn.php";

if (isset($_POST['iniciarS'])) {
    $pass=$_POST['pass'];
    
    $verificar = "SELECT * FROM usuarios WHERE user = ?  ";
    $pre_verificar = $conn -> prepare($verificar);
    $pre_verificar -> execute(array(
        $_POST['user'],
         
    ));
    
    $verificado = $pre_verificar -> fetch();

    if (password_verify($pass,$verificado['pass'])) {
        $pass = null;
        session_start();
        
        $id = $verificado['id'];
        $_SESSION['userID'] = $id;
        $_SESSION['user'] = $verificado['user'];
        $_SESSION['userClient'] =$verificado['user'];
        $_SESSION['name'] = $verificado['fname']." ".$verificado['lname'];
        header("location:https://appdotsell.com/app/wellsolutions/");

    }
    else
    {
        $conn = null;
        echo '   <div style="width:90%;" class="noExiste">
        <i class="fas fa-times"></i>
            <p>Contraseña o usuario incorrecto, intenta de nuevo.</p>
    </div>';
    }

   

 

}

?>