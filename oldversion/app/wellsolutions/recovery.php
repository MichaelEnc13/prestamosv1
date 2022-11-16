<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>recovery</title>
</head>
<body>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    <!-- <link rel="stylesheet" href="icons/all.css"> -->
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Pathway+Gothic+One&family=Satisfy&display=swap" rel="stylesheet">
<div class="login-container">

<div class="login-logo">
    <img src="img/logo.png" alt="">
</div>

<form action="<?php htmlspecialchars("PHP_SELF") ?>" method="post">

        <h2>Recuperar contrase√±a</h2>

        <label for="user"> <i class="far fa-envelope-open"></i> Ingresa tu correo electr√≥nico:</label>
        <input type="text"  id="user" placeholder="..." name="mail" autocomplete="on" required>

        <button class="btn" name="recover">Recuperar </button>
        <br>
        <?php include "core/recovery.php" ?>
      

        </form>
        
        <?php if(isset($_GET['d'])): ?>
    <div class="noExiste">
<i class="fas fa-paper-plane"></i>            <p>Te hemos enviado un mensaje a tu correo.</p>
<a href="https://wellsolutions.me"><button class="btn" name="">Iniciar sesi®Æn </button></a>
    </div>
<?php endif; ?>


</div>

 
</body>
</html>