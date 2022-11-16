<?php 
require "conn.php";
 //$fecha = date("l j F o -- H:i:s a");
 
if (isset($_POST['newClient'])) {
  
 
     $fecha = $_POST['fecha'];
    $cmd = "INSERT INTO clientes(nombre,apellido,cedula,celular,userClient)VALUES
    (?,?,?,?,?)";

    $userClient = $_SESSION['userClient'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cedula = $_POST['cedula'];
    $celular = $_POST['celular'];
    $montoPrestado = $_POST['montoPrestado'];
    $interes = $_POST['interes'];
    $cuotas = $_POST['cuotas'];
// Verificar si existe antes de agregarlo
    $verify = "SELECT * FROM  clientes WHERE userClient = ? AND cedula = ? OR celular = ?   ";
    $pre_verify = $conn -> prepare($verify);
    $pre_verify -> execute(array($cedula,$celular,$_SESSION['userClient']));

    
    $verified = $pre_verify->fetch();

    if ($verified['cedula']==$cedula || $verified['celular']==$celular) {
        header("location:addClient.php?exists");
        $conn = null;
    }else
    {
        //Se añade al cliente
        $pre_cmd = $conn -> prepare($cmd);
        $inserted = $pre_cmd -> execute(array(
            $fname,
            $lname,
            $cedula,
            $celular,
            $userClient
          
        ));
        
        
        
        // busco el ID del nuevo cliente
        
        $cmd = "SELECT id FROM clientes WHERE cedula = ? AND userClient = ?";
        $pre_cmd = $conn -> prepare($cmd);
        $pre_cmd -> execute(array($_POST['cedula'],$_SESSION['userClient']));
        
        $buscado =  $pre_cmd->fetch();
        
        
        // CREAR NUEVA DEUDA

        $cmd2 = "INSERT INTO deudores(cedula,celular,monto,interes,meses,interesGenerado,sumatoria,cuotas,total,fecha,userClient,cliente_id)VALUES
       (?,?,?,?,?,?,?,?,?,?,?,?)";

   

$montoPrestado = $_POST['montoPrestado'];
$interes = $_POST['interes'];
$meses = $_POST['meses'];
$interesGenerado = $_POST['InteresGenerado2'];
$sumatoria = $_POST['sumatoria'];
$cuotas = $_POST['cuotas'];
$total = $_POST['total'];
$userClient = $_SESSION['userClient'];




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
        $buscado['id']

    )
    );

        if ($inserted && $deudado) {
            header("location:client");
        }else
        {
            echo "error";
            $conn = null;
        }

    }




}


?>