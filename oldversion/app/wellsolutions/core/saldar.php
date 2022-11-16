<?php 

include "conn.php";
$cmd1 = "SELECT * FROM deudores WHERE cedula = ? AND prestamo_id = ?";
$pre_cmd1 = $conn -> prepare($cmd1);
$pre_cmd1 -> execute(array($_GET['cedula'],$_GET['pid']));
$prestamo = $pre_cmd1 -> fetch();

$cantidadR = $prestamo['monto'] - $prestamo['totalPagado'];



if (isset($_POST['saldar'])) {
    $monto = $_POST['monto'];
    $cedula  = $_GET['cedula'];
    $pid = $_GET['pid'];
    $saldar = "DELETE FROM  deudores WHERE prestamo_id =  ? AND cedula = ?";
    $pre_saldar = $conn -> prepare($saldar);
    if ($pre_saldar -> execute(array($pid,$cedula))) {

       header("location:index");
    }
}




?>