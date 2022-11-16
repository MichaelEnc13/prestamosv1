<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    <!-- <link rel="stylesheet" href="icons/all.css"> -->
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>



<div class="login-container">

        <div class="login-logo">
            <img src="img/logo.png" alt="">
        </div>

        <form action="<?php htmlspecialchars("PHP_SELF") ?>" method="post" class="login">

                <h2>Admin</h2>
                
                <div>
                    <i class="fas fa-user-alt"></i> 
                    <input type="text"  id="user" placeholder="Usuario" name="user" autocomplete="on" required>
                </div>

            <div>
                    <i class="fas fa-key"></i> 
                    <input type="password" id="pass "placeholder="Contraseña"  name="pass"  autocomplete="off" required>
            </div>
                
                <br>

                <button name="in" class="in">Entrar</button>
                <?php include "core/login.php" ?>


        </form>

         
        <?php if(isset($_GET['i'])): ?>
            <div class="noExiste" style="width:80%;margin:auto;margin-top:10px;">
            <i class="fas fa-exclamation-circle"></i>
                    <p>Datos incorrectos</p>
            </div>
        <?php endif; ?>

         
        <?php if(isset($_GET['logout'])): ?>
            <div class="noExiste" style="width:80%;margin:auto;margin-top:10px;">
            <i style="font-size:25px;" class="far fa-check-circle"></i>
                    <p>Sesión cerrada</p>
            </div>
        <?php endif; ?>


</div>



 

 
 

</body>
</html>