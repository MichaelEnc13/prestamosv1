<?php

// mnt -> monto
// tl -> total
//i -> interes
//mss -> meses
//sum -> sumatoria
//cu -> cuotas
//ig  -> interes generado

if(isset($_POST['epDone']))
{
    include "conn.php";
    
    $monto = $_POST['montoPrestado'];
    $interes = $_POST['interes'];
    $meses = $_POST['meses'];
    $interesGenerado = $_POST['InteresGenerado'];
    $sumatoria = $_POST['sumatoria'];
    $cuotas = $_POST['cuotas'];
    $total = $_POST['total'];
    $pid = base64_decode($_GET['pid']);
    $us = $_SESSION['userClient'];
    
    $cmd = "UPDATE deudores SET monto = ?, interes = ?, meses = ? , interesGenerado = ? ,sumatoria = ?, cuotas = ? ,total = ? WHERE userClient = ? AND prestamo_id = ?";
    $pre_cmd = $conn -> prepare($cmd);
    $done = $pre_cmd -> execute(array(
        intval($monto),
        intval($interes),
        intval($meses),
        intval($interesGenerado),
        intval($sumatoria),
        intval($cuotas),
        intval($total),
        $us,
        intval($pid)
        

        ));
        
        if($done)
        {
            header("location:prestamosClientes?c=".$_GET['c']);
        }else
        {
            $conn = null;
            echo "Algo salio mal";
        }
}

?>