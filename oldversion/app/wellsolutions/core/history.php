<?php 

include "conn.php";

if (isset($_GET['c'])) {
    $cmd = "SELECT * FROM historial WHERE userClient = ? AND cedula = ?   ORDER BY histo_id DESC";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute(array($_SESSION['userClient'],$_GET['c']));
    $historial = $pre_cmd -> fetchall();

    $cmd1 = "SELECT * FROM clientes WHERE  userClient = ? AND cedula = ? ";
    $pre_cmd = $conn -> prepare($cmd1);
    $pre_cmd -> execute(array($_SESSION['userClient'],$_GET['c']));
    $full_name = $pre_cmd -> fetch(); 
}



if (isset($_GET['f'])) {
    $cmd = "SELECT * FROM historial WHERE userClient = ? AND histo_id = ? ";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute(array($_SESSION['userClient'],$_GET['histo_id']));
    $historial = $pre_cmd -> fetch();

    $cmd1 = "SELECT * FROM clientes WHERE userClient = ? AND cedula = ? ";
    $pre_cmd = $conn -> prepare($cmd1);
    $pre_cmd -> execute(array($_SESSION['userClient'],$historial['cedula']));
    $full_name = $pre_cmd -> fetch(); 
}






?>