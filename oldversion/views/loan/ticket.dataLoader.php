<?php session_start()?>;
<img class='imgPrint' src='src/loaded_photo/<?php echo $_SESSION['user']['logo']?>'  > 
<style>
    .pdfContainer{
        width: 85%;
        margin: auto;
    }

    .imgPrint
    {
        display: none;
    }
 

    @media print{

        .pdfContainer
        {
            width: 50%;
        }
        .imgPrint{
            display: block;
        }

    
    }
</style>
 <?php
        include "../../model/autoload.php";
        $info = Prestamos::getTicketsInfo($_GET['paid_id'])['info'];
        $p_info = Prestamos::getLoansInfo($info['prest_id'])['info'];
        $client = Client::searchAclient($info['client_id']);

        $payType = $info['payType'] == 0? "Abono</b>  a un  ":"Pago</b>  de un";
        $reciboInfo = str_replace(" ","","recibo_".$client['fname'].$client['lname'].".pdf");
   
    
       
    ?>





<div class='pdfContainer' style=" font-family: var(--txt-2)">
        
        
        <img class='imgToPdf' src='src/loaded_photo/<?php echo $_SESSION['user']['logo']?>'  > 
        <h2>Recibo de Pago </h2>
        <p> Fecha:</p>
        <p><?php echo $info['date_paid'] ?></p>
        <div class='textDivider'>-------------------------------------------------</div>

        <p>Recibí de <b><?php echo $client['fname']." ".$client['lname'] ?></b> la suma de DOP $<b><?php echo number_format($info['amount'] ) ?></b> como <b><?php echo $payType ?> préstamo de <b> DOP $ <?php echo number_format($p_info['amount'])?></b>
            pagando del mismo <b><?php echo $info['dues'] ?></b> cuota(s). </p>
            <?php if($info['payment'] != 0): ?>
                <p>DOP $<b><?php echo number_format($info['payment']) ?></b> del monto, son provenientes de un abono realizado.</p>
            <?php endif;?>
            <?php if($info['payType'] != 0): ?>
        <br>
        <div class='textDivider'>-------------------------------------------------</div>
         
        <p><?php if($info['arriers']!=0):  echo "Cargo por mora: DOP $". $info['arriers']  ; endif;?></p>
        <p>Pagos realizados:</p>
        <p>
            <?php echo $info['paid_dues']." de ".$p_info['dues']?>
        </p>
        <div class='textDivider'>-------------------------------------------------</div>

        <?php endif;?>
        <p>Método de pago:</p>
        <p><b><?php echo $info['payMethod']?></b></p>
        <div class='textDivider'>-------------------------------------------------</div>

        <p>Firma responsable</p>

        <p class="sign" style="font-family:firma;"><?php echo $_SESSION['user']['uName']." ". $_SESSION['user']['lName']?></p>
        <br><br>
        <small>Imprime este recibo solo si es necesario. Cuidemos el medio ambiente.</small>

</div>
 

<div class="ticketActions">
 
        <button  onclick="print()"> <img src="src/icons/printer.svg" alt=""> &MediumSpace; Imprimir</button>
        
        <input type="hidden" id="pdfData" name="pdf" value="<?php echo $salida?>">
        <input type="hidden" id="pdfName" name="pdfName" value="<?php echo  $reciboInfo?>">
        <button onclick="" id="pdfBtn"><img src="src/icons/pdf.svg" alt=""> &MediumSpace; Descargar PDF</button>
        
       <!--  <button><img src="src/icons/link.svg" alt=""> &MediumSpace; Compartir enlace</button> -->
    </div>
</div>
     
    