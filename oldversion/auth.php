
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando...</title>
</head>
<body>
<?php 



        if(isset($_GET['target'])=="recover"):
            session_start(); 
            $_SESSION['recoverMail'] = base64_decode($_GET['m']);
            header('Location: login?newPass=true');
        endif;




?>  
</body>
</html>


