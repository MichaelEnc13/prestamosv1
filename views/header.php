<?php
clearstatcache(true);

  include "model/autoload.php";
  date_default_timezone_set('America/Santo_Domingo');
  User::checkSessionStatus();
  
  
  $user = User::getUser($_SESSION['user']['user_id']); //accedo a los datos de la sesion
  $checkStatus = $user['status']; //ESTADO DE LA CUENTA
  $days = $user['days'];  // DIAS DE PAGO
  $suspend = "";
  $block = false;
  
  if($checkStatus == 0):
    User::accessControl($_SESSION['user']['user_id'],false);  //controla el acceso acorde a si se ha pagado o no
    //Pone el valor en la base de datos como falso.
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



    <meta http-equiv="Expires" content="0">
 
 <meta http-equiv="Last-Modified" content="0">
  
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  
 <meta http-equiv="Pragma" content="no-cache">
    <meta name="theme-color" content="#ffffff"/>
    <link rel="apple-touch-icon" href="src/appIcon/favicon.png">
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
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  

    <!--   <script src="src/jquery.js" ></script> -->
 
     
      
    
    <title>DOTSELL V2</title>
</head>
<body>

<div class="global">



 
<?php  
  ob_get_contents();
 
 
include "settings/notificaction_alert.php"?>
