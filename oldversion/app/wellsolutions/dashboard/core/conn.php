<?php 
$dbserver = "mysql:host=localhost;dbname=wellsolu_sistema_prestamos";
$dbuser= "wellsolu_michael13";
$dbpass = "zPkS&Lp+SvnP";

try {
    $conn =  new PDO($dbserver,$dbuser,$dbpass);
  //echo "conectado";
} catch (\Throwable $th) {
  // echo "error";
}
?>