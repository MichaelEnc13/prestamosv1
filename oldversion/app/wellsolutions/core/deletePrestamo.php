<?php

if(isset($_POST['dp']))
{
    include "conn.php";
    $cmd = "DELETE FROM deudores WHERE userClient = ? AND prestamo_id = ?";
    $pre_cmd = $conn -> prepare($cmd);
    $done = $pre_cmd -> execute(array(
        $_SESSION['userClient'],
        base64_decode($_GET['pid'])
        
        ));
        
    if($done)
    {
        header("location:prestamosClientes?c=".$_GET['c']);
    }else
    {
        $conn = null;
        echo "Ha ocurrido un error";
    }
}

?>