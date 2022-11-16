
<?php
    include "model/autoload.php";
    session_start();
    User::checkSessionStatusLogin();

?>


<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/text_font.css"  >
    <link rel="stylesheet" href="src/form.css">
    <link rel="stylesheet" href="src/icons/all.min.css">  
    <link rel="shortcut icon" href="src/appIcon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="src/jloading-overlay.min.css">
    <title>Inicio</title>
</head>
<body>
 
    <div class="form_container">
            <?php  
                $url = "";
                if(isset($_GET['register']) == "true"):
                    $url = "views/start/register_form.php";
                    elseif( isset($_GET['recover'])=="true"):
                        $url = "views/start/recoverPassword.php";
                            elseif(isset($_GET['sent'])=="true"):
                                $url = "views/start/mailSend.php";
                                    elseif( isset($_GET['newPass'])):
                                        $url = "views/start/newPass.php";
                                            else :
                                                $url = "views/start/login_form.php";
                endif;
            
                include $url;
            ?>
         

      
    </div>

 
<script src="src/jquery.js"></script>
<script src="src/form.js"></script>
<script src="src/icons/all.min.js"></script>
<script src="src/jloading-overlay.js" ></script>
</body>
</html>