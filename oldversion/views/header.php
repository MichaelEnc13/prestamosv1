<?php

  if(session_status() != 2)session_start();
  include "model/autoload.php";
  User::checkSessionStatus();
  date_default_timezone_set('America/Santo_Domingo');

  $user = User::getUser($_SESSION['user']['user_id']);
  $checkStatus = $user['status'];
  $days = $user['days'];
  $suspend = "";
  $block = false;

 
  
  if($days == date("d") && $checkStatus == 0 ):
    User::accessControl($_SESSION['user']['user_id'],false);
    $block =  true;
    $suspend =  "views/settings/suspend.php";
  endif;

  if( $checkStatus == 0):
    User::accessControl($_SESSION['user']['user_id'],false);
    $block =  true;
    $suspend =  "views/settings/suspend.php";
  endif;


 

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La aplicacion que te ayudará a administrar tu negocio de prestamos.">

    <meta name="theme-color" content="#ffffff"/>
    <link rel="apple-touch-icon" href="src/appIcon/icon-192.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="src/text_font.css"  >
      <link rel="stylesheet" href="src/app.css"  >
      <link rel="manifest"   href="./manifest.json">
      <link rel="shortcut icon" href="src/appIcon/favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="src/alertify.min.css">
      <link rel="stylesheet" href="src/semantic.min.css">
      <link rel="stylesheet" href="src/bootstrap.min.css">
      <link rel="stylesheet" href="src/icons/all.min.css">
      <link rel="stylesheet" href="src/jloading-overlay.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"  ></script>

  

    <!--   <script src="src/jquery.js" ></script> -->
 
     
      
    
    <title>DOTSELL V2</title>
</head>
<body>
    
<div class="global">



<!-- <div id="installPrompt" class="showPromt">
  <span class="close"><i class="fas fa-times"></i></span>
  <span>Instala la aplicacion</span>
  <button id="installButton"><i class="fas fa-download"></i> Instalar</button>
</div> -->

 
<?php  
  ob_get_contents();
 
 
include "settings/notificaction_alert.php"?>
