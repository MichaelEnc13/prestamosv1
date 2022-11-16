<?php 

include "conn.php";
$cmd1 = "SELECT * FROM deudores WHERE userClient = ? AND cedula = ? AND prestamo_id = ? ";
$pre_cmd1 = $conn -> prepare($cmd1);
$pre_cmd1 -> execute(array($_SESSION['userClient'],$_GET['cedula'],$_GET['pid']));
$prestamo = $pre_cmd1 -> fetch();



if (isset($_POST['monto'])) {
    $monto = $_POST['monto'];
    $cedula  = $_GET['cedula'];
    $pid = $_GET['pid'];
    $add = "UPDATE deudores SET totalPagado =  totalPagado + ?, cuotasRestantes = cuotasRestantes + 1  WHERE userClient = ? AND prestamo_id = ? AND cedula = ?  " ;
    $pre_add = $conn -> prepare($add);

    if ($pre_add -> execute(array($monto,$_SESSION['userClient'],$pid,$cedula))) {
        // ELEGIR NUEVA CUOTAS RESTANTE
        $cmd2 = "SELECT * FROM deudores WHERE userClient = ? AND cedula = ? ";
        $cedula = $_GET['cedula'];
    //    $celular = $_GET['celular'];
        $pre_cmd2 = $conn -> prepare($cmd2);
        $pre_cmd2 -> execute(array($_SESSION['userClient'],$cedula));
        $ver_cuotas_restantes = $pre_cmd2 -> fetch();

// buscar ID del cliente para ponerlo en el historial
        $cmd = "SELECT id FROM clientes WHERE cedula = ? AND userClient = ?";
        $pre_cmd = $conn -> prepare($cmd);
        $pre_cmd -> execute(array($_GET['cedula'],$_SESSION['userClient']));
        
        $buscado =  $pre_cmd->fetch();

       $fecha = $_POST['fecha'];   
        $historial = "INSERT INTO historial (fecha,cedula,monto,interes,cuotas, montoEntregado,formaPago,totalPagado,cuotasRestantes,userClient,cliente_id)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $pre_historial = $conn -> prepare($historial);
        
        $pre_historial -> execute(
            array(
                $fecha,
                $cedula,
                $prestamo['monto'],
                $prestamo['interes'],
                $prestamo['cuotas'],
                $monto,
                $_POST['formaPago'],
                $prestamo['totalPagado']+$monto,
                $ver_cuotas_restantes['cuotasRestantes'],
                $_SESSION['userClient'],
                $buscado['id']


            )
        ); 

        
       header("location:addpay?added&cedula=".$_GET['cedula']."&pid=".$_GET['pid']);
    }else
    {
        $conn = null;

    }
}




?>

