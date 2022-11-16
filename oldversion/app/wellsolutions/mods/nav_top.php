<?php 
//error_reporting(0);
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['name']) || !isset($_SESSION['userClient'])) {
  header("location:login");

}
date_default_timezone_set('america/Santo_Domingo');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/print.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    <!-- <link rel="stylesheet" href="icons/all.css"> -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <?php include "res/font-text.php" ?>
    <title>Well Solutions </title>
</head>
<body>

<header>
  <nav class="navbar navbar-expanded">

      <ul class="nav-collapsed">

      
  <div class="logo">
    <img class="lg" src="img/logo.png" width="75" alt="">
  </div>
    <li class="nav-list list-logo"><a href="index" class="nav-link"> <span  class="innerText"  >  Well Solutions
</span></a></li>
        <li class="nav-list"><a href="https://appdotsell.com/app/wellsolutions/" class="nav-link"><i class="fas fa-home"></i> <span class="innerText">Inicio</span></a></li>
        <li class="nav-list"><a href="client" class="nav-link"><i class="fas fa-user-check"></i> <span class="innerText">Clientes</span></a></li>
        <li class="nav-list"><a href="addClient" class="nav-link"><i class="fas fa-user-plus"></i> <span class="innerText">Añadir clientes</span></a></li>
        <li class="nav-list"><a href="summary" class="nav-link"><i class="far fa-chart-bar"></i> <span class="innerText">Resumen</span></a></li>
        
        <div class="eyu" style="position:absolute;right:10px;">
            
             <a href="confi"><span class="user-w"><i style="margin-right:10px;" class="far fa-user"></i>  <?php echo $_SESSION['name'];?></span></a>
      
   
             <li  class="nav-list"><a href="core/cerrarSesion.php" class="nav-link exit exit-w"><i class="fas fa-sign-out-alt"></i> <span class="innerText">Salir</span></a></li>
            
        </div>

      </ul>
  </nav>
  

 </header>
 
 
    <div class="dropDown">

         <div class="user">
              <span class="user-s"><i style="margin-right:10px;" class="far fa-user"></i>  <?php echo $_SESSION['name'];?>  <hr><br></span>
           
         </div>
          <a href="pay" class="nav-link "><i class="fas fa-money-check-alt"></i> Formas de pago</a>
          <a href="confi" class="nav-link "><i class="fas fa-user-cog"></i> Ajustes</a>
          <a href="core/cerrarSesion.php" class="nav-link "> <div class="dropDown-items exit-s"> <i class="fas fa-sign-out-alt"></i>Salir </div></a>
          

 </div>


<?php  
include "core/conn.php";

$cmd1 = "SELECT * FROM usuarios WHERE id = ? ";
$pre_cmd1 = $conn -> prepare($cmd1);
$pre_cmd1 -> execute(array($_SESSION['userID']));
$verificarEstado =  $pre_cmd1 -> fetch();

 
 
if ($verificarEstado['user_status'] != "activo" &&  $verificarEstado['user_status'] != "suspendido"   ) {
  echo "<p style=\"text-align:center;\" class=\"pendiente\"><i class=\"fas fa-exclamation-triangle\"></i>Pago pendiente</p>";
}


    
  
?>




 <script src="js/darkMode.js"></script>