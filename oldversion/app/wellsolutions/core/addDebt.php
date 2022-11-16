<?php 


if (isset($_POST['addDebtBtn'])) {
   $fecha = $_POST['fecha'];
    include "conn.php";
    $cmd2 = "INSERT INTO deudores(cedula,celular,monto,interes,meses,interesGenerado,sumatoria,cuotas,total,fecha,userClient,cliente_id)VALUES
    (?,?,?,?,?,?,?,?,?,?,?,?)";

    $cedula = $_GET['cedula'];
    $celular = $_GET['celular'];

    $montoPrestado = $_POST['montoPrestado'];
    $interes = $_POST['interes'];
    $meses = $_POST['meses'];
    $interesGenerado = $_POST['InteresGenerado'];
    $sumatoria = $_POST['sumatoria'];
    $cuotas = $_POST['cuotas'];
    $total = $_POST['total'];
    $userClient = $_SESSION['userClient'];
    $cliente_id =  $_GET['cliente_id'];



    $pre_cmd2 = $conn -> prepare($cmd2);
    $deudado = $pre_cmd2 -> execute(
        array(
            $cedula,
            $celular,
            $montoPrestado,
            $interes,
            $meses,
            $interesGenerado,
            $sumatoria,
            $cuotas,
            $total,
            $fecha,
            $userClient,
            $cliente_id

        )
        );

        if ($deudado) {
            header("location:index.php");
        }else
        {
            $conn = null;
            echo "ERROR";
        }
}



?>