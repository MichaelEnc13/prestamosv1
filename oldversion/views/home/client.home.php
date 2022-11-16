    <?php 
 
include file_exists("model/autoload.php")?"model/autoload.php":"../../model/autoload.php";

Prestamos::updateLoanStatus();
$pendients = isset($_GET['filter'])?Prestamos::filter($_GET['filter']):Prestamos::getPendientClient();
 
    if($pendients):
        foreach($pendients as $pendient):
           $client = Client::searchAclient($pendient['client_id']);
           if($client):
                $prestDate  = Prestamos::getPendientClientCount($pendient['client_id'])['all'];
                $prestCount = Prestamos::getPendientClientCount($pendient['client_id'])['cant'];
                $nextTime   = Prestamos::getPayDay($pendient['client_id'],date('d'));
?>

 

 
    <div class="client" >
    <div class="this_client" id="<?php echo $client['client_id']?>"></div>
    
    <span class="clientName">
        <?php echo $client['fname']." ".$client['lname'];  ?>
    </span>
    

    <span class="clientInf">
        <?php echo "Cantidad de Préstamos: ".$prestCount;  ?>
    </span>

    <?php foreach($prestDate as $date): 
        if($date['nextTime'] == date("d/m/Y") AND $date['pay_status'] == 0 ):?>
            <span class="client_alert" ><i class="fas fa-bell"></i></span>
               <?php   elseif(intval($date['nextPay']) < intval(date('z'))  && $date['pay_status'] == 0 ): ?> 
           <span class="client_alert" ><i class="fas fa-bell"></i></span>
    <?php endif; endforeach;   ?>

</div>
 

<?php
endif;
endforeach;
 
else:

    echo "
        <div class='noPrest'>
        No hay préstamos pendientes.
         <img src='src/icons/datos.svg'>
        </div>
        ";
endif;

?>