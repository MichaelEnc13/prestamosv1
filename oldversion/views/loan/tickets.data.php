<?php
include !file_exists("../../model/autoload.php")?"./model/autoload.php":"../../model/autoload.php";
//Para obterner informacion del cliente.
 
$pid =  $_SESSION['pid'];;
  
 $tickets = Prestamos::tickets($pid);

   
?>
<div class="ticketContainer">
    <?php    foreach($tickets['list'] as $ticket):?>


    <div class="tickets" onclick="viewTicketInfo(<?php echo $ticket['paid_id'] ?>)">
        <span>
            Id. del Recibo
        <?php echo $ticket['paid_id'] ?>
        </span>
        <span>
            Fecha:
            <?php echo $ticket['date_paid'] ?> 
            
        </span>
    </div>
    <?php endforeach?>

</div>
<div class="overlay" onclick="closeApplyPayment()"></div>

