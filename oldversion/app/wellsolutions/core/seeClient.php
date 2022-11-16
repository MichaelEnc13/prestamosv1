<!-- extraccion de todos los clientes registrados -->

<?php 

 

include "conn.php";
if(session_status() != 2) session_start();
//error_reporting(0);

if(!isset($_GET['buscarCliente']))

{

    $cmd = "SELECT * FROM clientes WHERE userClient = ?";

    $pre_cmd = $conn -> prepare($cmd);

    $pre_cmd -> execute(array($_SESSION['userClient']));

    $clientes = $pre_cmd -> fetchall();

    $cantidad_clientes =  $pre_cmd -> rowCount();

}else

{

    // se busca el nombre del cliente

    $cmd = "SELECT * FROM clientes WHERE userClient = ? AND nombre LIKE '%".$_GET['buscarCliente']."%'";

    $pre_cmd = $conn -> prepare($cmd);

    $pre_cmd -> execute(array($_SESSION['userClient']));

    $clientes = $pre_cmd -> fetchall();

    $cantidad_clientes =  $pre_cmd -> rowCount();


}



 



if (isset($_GET['delete'])) {

 

    //  Eliminar de los clientes

    $delete = "DELETE FROM clientes WHERE userClient = ?  AND id = ?  ";

    $pre_delete = $conn -> prepare($delete);

    // eliminar de  los deudores



    if ($pre_delete -> execute(array($_SESSION['userClient'],$_GET['clientID']))) {



        $delete = "DELETE FROM deudores WHERE userClient = ? AND cedula = ? ";

        $pre_delete = $conn -> prepare($delete);



        if($pre_delete -> execute(array($_SESSION['userClient'],$_GET['cedula'])))

        {

        $delete = "DELETE FROM historial WHERE userClient = ? AND cedula = ? ";

        $pre_delete = $conn -> prepare($delete);

        $pre_delete -> execute(array($_SESSION['userClient'],$_GET['cedula']));

            header("location:../client");

        }

        

    }

 }



?>