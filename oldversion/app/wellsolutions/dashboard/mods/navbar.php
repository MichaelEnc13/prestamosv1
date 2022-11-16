<?php

session_start();
if (!isset($_SESSION['superUser'])) {
    header("location:login");
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="icons/all.css">
    <?php include 'res/font-text.php';date_default_timezone_set('america/Santo_Domingo'); ?>
    <title>Dashboard</title>
</head>
<body>
    <nav class="side_nav">
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>

        <ul class="nav_collapse">
            <li class="nav_item"><a href="home" class="nav_link test"><i style="margin-right:10px;" class="fas fa-border-all"></i> General</a></li>
            <li class="nav_item"><a href="add-user" class="nav_link"><i style="margin-right:10px;" class="far fa-plus-square"></i> Agregar</a></li>
            <li class="nav_item"><a href="" class="nav_link"><i style="margin-right:10px;" class="far fa-plus-square"></i>Formas de pago</a></li>
            <li class="nav_item"><a href="" class="nav_link"><i style="margin-right:10px;" class="far fa-plus-square"></i>Actualizaciones</a></li>
            
        </ul>


        <div class="controls_botton">
            <a href="core/cerrarS.php"><i class="fas fa-power-off"></i></a>
        </div>
        <span class="toggle sm"><i class="fas fa-bars"></i></span>
    </nav>



