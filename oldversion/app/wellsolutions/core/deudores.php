<?php 

include "conn.php";
 
if (!isset($_GET['c'])) {
    $cmd = "SELECT DISTINCT cedula FROM deudores WHERE totalPagado<sumatoria AND userClient = ? ORDER BY prestamo_id DESC ";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute(array($_SESSION['userClient']));
    $deudores = $pre_cmd -> fetchall();

}



if (isset($_GET['c'])) {
    $cmd = "SELECT * FROM deudores WHERE totalPagado<sumatoria AND userClient = ? AND cedula = ?  ORDER BY prestamo_id DESC";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute(array($_SESSION['userClient'],base64_decode($_GET['c'])));
    $deudores = $pre_cmd -> fetchall();
    
    $cmd2 = "SELECT * FROM clientes WHERE  userClient = ? AND cedula= ?  ";
    $pre_cmd2 = $conn -> prepare($cmd2);
    $pre_cmd2 -> execute(array($_SESSION['userClient'],base64_decode($_GET['c'])));
    $deuda_de_cliente = $pre_cmd2 -> fetch();

}

