<?php 
$amountDues = $loan['total'];
$arrier  = 0;

if(date("z") > $loan['nextPay']):
    $dayMonth =  cal_days_in_month(CAL_GREGORIAN,date("j"),date("y"));
    
    $interest = floatval($_SESSION['user']['amount_arriers']/100);
    $daysArrier = intval(date("z") - $loan['nextPay']);
     $arrier = intval((($amountDues * $interest)/$dayMonth)* $daysArrier);
endif;
$estimated = $amountDues + $arrier;
?>


<div class="applyPay actions_loans_forms" id="applyPay_<?php echo $loan['prest_id']?>">
    <span class="close" onclick="closeApplyPay()">
        <img src="src/icons/close.svg" alt="">
    </span>
    <h2>Aplicar un pago</h2>
    
    <form id="applyPaid_form" onsubmit="return false;">

        <label for="">Método de pago:</label>
        <select name="" id="payMethod_<?php echo $loan['prest_id']?>">
            <option value="Efectivo">Efectivo</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Cheque">Cheque</op-tion>
        </select>
        <label for="">Cantidad de cuotas pagadas:</label>
        <input type="number" min="1" value="1" id="dues_cant" placeholder="...">

        <?php if($arrier > 0):?>
          <label for="">Mora:</label>
          <input type="number" id="arrier" placeholder="..." value="<?php echo $arrier?>" disabled> 
        <?php endif;?>
        <span>Total estimado a cobrar: DOP $<?php echo number_format($estimated) ?></span>
        <input type="hidden"  id="estimated" value="<?php echo $estimated?>">
        <label for="">Monto:</label>
        <input type="number"  class="amount_<?php echo $loan['prest_id']?>" id="amount" value="0" placeholder="...">

<br>

    <?php if($loan['payment'] > 0):?>
        <hr>
        <label for="">El cliente ha realizado un abono, Deseas aplicar el abono al pago?</label>
     <b>   <?php echo "DOP $".$loan['payment']?></b>
        <input type="checkbox" value="1" name="applyPayments" id="applyPayments_<?php echo $loan['client_id']?>">
    <?php endif;?>
        <br>
        <button id="apply_pay_btn" onclick="addPay(<?php echo $loan['prest_id']?>,<?php echo $loan['client_id']?>,<?php echo $loan['payment']?>,<?php echo $loan['paid_dues']?>,<?php echo $arrier?>)"  >
            Aplicar pago
        </button>
    </form>
</div>