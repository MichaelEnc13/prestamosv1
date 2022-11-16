<?php 
 
 
    include "conn.php";
    $cmd1 = "SELECT * FROM deudores WHERE  totalPagado<sumatoria AND userClient = ? AND cedula = ? OR celular = ?  ";
    $pre_cmd1 = $conn -> prepare($cmd1);
    $pre_cmd1 -> execute(array( $_SESSION['userClient'],$clientes['cedula'],$clientes['celular'] ));
    $cntDebt = $pre_cmd1 -> rowCount();
 
?>