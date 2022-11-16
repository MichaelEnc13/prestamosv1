<?php 
include "conn.php";

$cmd1 = "SELECT * FROM deudores WHERE userClient = ? AND cedula = ? OR celular = ?  ";
$cedula = $_GET['cedula'];
$celular = $_GET['celular'];
$pre_cmd1 = $conn -> prepare($cmd1);
$pre_cmd1 -> execute(array($cedula,$celular,$_SESSION['userClient']));
$deudas = $pre_cmd1 -> fetchall();
$ver_cuotas_restantes = $pre_cmd1 -> fetch();

?>