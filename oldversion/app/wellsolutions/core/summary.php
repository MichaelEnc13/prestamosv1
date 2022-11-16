<?php include "conn.php" ;


$fecha = date('o-m');

$cmd = "SELECT monto,interes FROM deudores WHERE userClient = ? AND fecha LIKE '".$fecha."%'";
$pre_cmd = $conn -> prepare($cmd);
$pre_cmd -> execute(array($_SESSION['userClient']));
$summary = $pre_cmd -> fetchall();
$summary_cant = $pre_cmd -> rowCount();

$meses = ['','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];

$mes =  date('m');
$mes = intval($mes);

$mes_actual = $meses[$mes];

foreach($summary as $summary)
{
    
   
    $total = $summary['monto'] *($summary['interes']/100);
    $monto = $monto + $total;
    
    
    $dinero_prestado =  $dinero_prestado + $summary['monto'];
    
     
}









?>
