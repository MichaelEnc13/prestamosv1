<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    <!-- <link rel="stylesheet" href="icons/all.css"> -->

<link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&family=Satisfy&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<div class="login-container">

<div class="login-logo">
    <img src="img/logo.png" alt="">
</div>

<form action="<?php htmlspecialchars("PHP_SELF") ?>" method="post">

        <h2>Login</h2>

        <label for="user"> <i class="fas fa-user-alt"></i> Usuario:</label>
        <input type="text"  id="user" placeholder="..." name="user" autocomplete="on" required>
        <label for="pass"><i class="fas fa-key"></i> Contrase&ntilde;a: </label>
        <input type="password" id="pass "placeholder="..."  name="pass"  autocomplete="off" required>
        <button class="btn" name="iniciarS">Iniciar sesión  <i class="fas fa-sign-in-alt"></i></button>
        <br><br><br>
        <a  style="text-align:center;" href="https://appdotsell.com">Cambia a la versión 2.0</a>
        <br>
        <?php include "core/login.php" ?>
     
        <?php if(false):?>
                <!--No tienes una cuenta? <a href="registro" >Registrarse </a>-->
                <!--Olvidaste tu contrase&ntilde;a? <a href="recovery" >Recuperar acceso</a>-->
        <?php endif;?>
        </form>

</div>

<!-- usuario inexistente -->

<?php if(isset($_GET['u'])): ?>
    <div class="noExiste">
        <i class="fas fa-times"></i>
            <p>Usuario inexistente</p>
    </div>
<?php endif; ?>

<?php if(isset($_GET['i'])): ?>
    <div class="noExiste">
    <i class="fas fa-exclamation-circle"></i>
            <p>Contraseña incorrecta</p>
    </div>
<?php endif; ?>

<?php if(isset($_GET['logout'])): ?>
    <div class="noExiste">
    <i class="fas fa-times"></i>
            <p>Cuenta suspendida por retraso en el pago</p>
    </div>
<?php endif; ?>


 
<script src="js/form.js"></script> 

</body>
</html>