<div class="overlay" ></div>
<?php
include !file_exists("../../model/autoload.php")?"./model/autoload.php":"../../model/autoload.php";
//Para obterner informacion del cliente.
if(session_status() != 2):
    session_start();
endif;
   $cid = $_SESSION['cid'];
   $client = Client::searchAclient($cid);
   $client_loan = Prestamos::getCLientLoans($cid);
    
   
?>

<span class="client_prest">
    <?php if(isset($_SESSION['cid'])):?>
    
   <b> <?php echo $client['fname'] ?></b>  <?php echo $client_loan['cant'] != 0? " tiene ". $client_loan['cant']." préstamos":" No tiene préstamos"; ?> 
   <?php else:?>
    <b>No has elegido ningún cliente</b>
   <?php endif;?>
</span>
<div class="loan_container">


  <?php if($client_loan['list']): foreach($client_loan['list'] as $loan):
        $data = json_encode($loan);
    ?>
    <div class="loan " id="loan_<?php echo $loan['prest_id']?>">
    <div class="loansId" id="loan_<?php echo $loan['prest_id']?>"></div>
        <h3 style="display: flex;">Estado:&ThinSpace;<?php echo $loan['amount_paid'] >= $loan['sumatory'] ?"<p style='display:inline;color:	#22bb33;'>Completado</p>":" <p style='display:inline;color:red;'>Pendiente</p>";?></h3>
        <span class="amount">
            <i class="fas fa-calendar-week"></i>
           <span> Fecha:</span>
            <?php echo $loan['date_p']?>
           
          
        </span>
        <span class="amount">
        <i class="fas fa-money-check-alt"></i>
            <span>Capital:</span>
            <?php echo "DOP $".number_format($loan['amount'])?>
        </span>

        <span class="interest">
        <i class="fas fa-percent"></i>
            <span>Interés:</span>
            <?php echo $loan['interest']."%"?>
        </span>
        <span class="month">
        <i class="far fa-calendar-alt"></i>
            <span>Meses:</span>
            <?php echo $loan['month']?>
        </span>
        
        <span class="paymode">
        <i class="far fa-handshake"></i>
            <span>Modo de pago:</span>
            <?php 
            $paymode = "";
            if($loan['paymode']==4):
                $paymode = "Semanal";
                elseif($loan['paymode']==2):
                    $paymode = "Quincenal";
                    elseif($loan['paymode']==1):
                        $paymode = "Mensual";
                else:
                    $paymode = "Diario";
            endif;
            
            echo $paymode ;
            ?>
        </span>
        
        <span class="int_generated">
        <i class="fas fa-coins"></i>
            <span>Interés generado:</span>
            <?php echo  "DOP $".number_format($loan['int_generated'])?>
        </span>
        
        <span class="sumatory">
        <i class="fas fa-dollar-sign"></i>
            <span>Monto + Interés generado:</span>
            <?php echo  "DOP $".number_format($loan['sumatory'])?>
        </span>
        <span class="dues">
        <i class="fas fa-calendar-day"></i>
            <span>Cuotas:</span>
            <?php echo $loan['dues']?>
        </span>
        <span class="total">
        <i class="fas fa-equals"></i>
            <span>Monto por Cuotas:</span>
            <?php echo  "DOP $".number_format($loan['total'])?>
        </span>

        <span class="paid_dues">
        <i class="fas fa-hand-holding-usd"></i>
            <span>Cuotas Pagadas:</span>
            <?php echo $loan['paid_dues']?>
        </span>

        <span class="payment">
        <i class="fas fa-money-bill-alt"></i>
            <span>Abonos:</span>
            <?php echo  "DOP $".number_format($loan['payment'])?>
           
        </span>
        
     <!--    <span class="arriers">
            <i class="fas fa-history"></i>
            <span>Cuotas atrasadas:
            
            </span> -->
            
        </span>
        <span class="tpaid">
        <i class="fas fa-history"></i>
            <span>Monto pagado:</span>
            <?php echo  "DOP $".number_format($loan['amount_paid'])?>
            
        </span>

        <span>
        <?php   if($loan['paid_dues'] != 0):?><br>
            <?php  if($loan['nextTime'] == date("d/m/Y")):
                echo "<span style='color:#FF5733;'>El próximo pago es hoy</span>"?>
                <?php  elseif($loan['nextPay'] < date("z")):?>
                    <?php echo "<span style='color:red;'>El próximo pago era el : " .$loan['nextTime']." </span>"; ?>
                <?php  else:?>
                    <?php echo "El próximo pago será el " .$loan['nextTime']; endif; ?>
                    <?php  endif;?>

        
           
        </span>
            <span>
               
                <?php 
                if( date("z") > $loan['nextPay'] && $loan['nextPay'] != 0 ):
                    echo intval(date("z")-$loan['nextPay'])." Días de retraso ";
                endif;?>
            </span>
        <div class="loan_controls">            
            <button onclick="addPayForm(<?php echo $loan['prest_id']?>)">
                Aplicar pago
            </button>
            <?php include "add.pay.php" ?>
            <button class="deposit" data-prestId="<?php echo $loan['prest_id']?>" data-cid="<?php echo $loan['client_id']?>" >
                Abonar
            </button>
            <!-- Buscar los recibos del prèstamo -->
            <input type="hidden" id="pid" value="<?php echo $loan['prest_id']?>">
            <input type="hidden" id="cid" value="<?php echo $loan['client_id']?>">
            <button class="viewTicketBtn" id="viewTicketBtn_<?php echo $loan['prest_id']?>" > Recibos del préstamo<input type="hidden" id="pid" value="<?php echo $loan['prest_id']?>"></button>
                        
         
            <button onclick='editPrestWindow(<?php echo $data ?>)'>
                Editar
            </button>
            <button onclick="deletePrest(<?php echo $loan['prest_id']?>,<?php echo $loan['client_id']?>)">
               Eliminar
            </button>
        </div>
       
    </div>
<?php endforeach; else: ?>
        <span class="no_found"><img src="src/icons/nada.svg" alt=""></span>
    <?php endif;?>
    
</div>




<?php include "apply.payment.php" ?>
<?php include "edit.prest.php" ?>
