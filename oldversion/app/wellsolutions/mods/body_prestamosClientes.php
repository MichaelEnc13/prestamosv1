<?php include "core/deudores.php" ?>
<h2 class="clt"  style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;margin-top:10px;">Préstamos pendientes   </h2>
<div class="start-page-container">

<?php if($deudores):?>



<?php  foreach($deudores as $deudores):
        
        $cmd1 = "SELECT * FROM clientes WHERE userClient = ? AND cedula = ? OR celular = ?  ";
        $pre_cmd1 = $conn -> prepare($cmd1);
        $pre_cmd1 -> execute(array( $_SESSION['userClient'],$deudores['cedula'],$deudores['celular']));
        $clientes = $pre_cmd1 -> fetch();
?>


<div class="deudas">
    <h3 class="clt">Cliente</h3>
        <span>ID: <?php echo $deudores['prestamo_id'] ?></span>
        <small class="clt" style="font-size:15px;">Fecha: <?php echo $deudores['fecha'] ?></small>
        <span style="font-size:30px;"><?php echo $clientes['nombre']." ".$clientes['apellido'] ?></span>

            <!-- estado del prestamo -->
                    <?php if ($deudores['totalPagado']>=$deudores['sumatoria']):?>
                         <span style="display:inline;color:#22bb33;"><i class="fas fa-check-circle"></i> Completo</span><br><br>

                    <?php else: ?>
                        <span style="display:inline;color:#f0ad4e;"><i class="fas fa-exclamation-triangle"></i> Pendiente</span><br><br>
                    <?php endif; ?>

        <span>Monto prestado: <?php echo "$".number_format($deudores['monto'] ) ?></span>
        <span>Monto a pagar: <?php echo "$".number_format($deudores['sumatoria'] ) ?></span>

        <span>Interés: <?php echo $deudores['interes']."% ( $".$deudores['interesGenerado']." )" ?></span>
        <span>Cuotas: <?php echo $deudores['cuotasRestantes'] ?> de <?php echo $deudores['cuotas'] ?></span>
        <span>Cuotas de: <?php echo "$".number_format($deudores['total']) ?></span>
        <span>Total pagado: <?php echo "$".number_format($deudores['totalPagado']) ?></span>

            <a href="addpay?cedula=<?php echo $clientes['cedula']."&pid=".$deudores['prestamo_id'] ?>"><button class="btn addpay-btn ">Añadir pago <i class="fas fa-hand-holding-usd"></i></button></a><br>
            <a href="history?c=<?php echo $clientes['cedula']?> "> <button class="btn delete" id="delete">Factura</button></a> 
            
            <a href="ep?c=<?php echo base64_encode($clientes['cedula'])."&pid=".base64_encode($deudores['prestamo_id'])."&mnt=".base64_encode($deudores['monto'])."&i=".base64_encode($deudores['interes'])."&mss=".base64_encode($deudores['meses'])."&ig=".base64_encode($deudores['interesGenerado'])."&sum=".base64_encode($deudores['sumatoria'])."&cu=".base64_encode($deudores['cuotas'])."&tl=".base64_encode($deudores['total'])?> "> <button class="btn delete" id="delete">Editar</button></a>   
            <a href="dp?pid=<?php echo base64_encode($deudores['prestamo_id'])."&c=".base64_encode($deudores['cedula'])?> "> <button class="btn delete" id="delete">Eliminar pr&eacute;stamo</button></a> 


 
          
</div>
 


<?php endforeach; ?>
 
<?php else:?>
    <div class="no-prestamos">
                <h2 class="clt" > <?php echo $deuda_de_cliente['nombre'] ?> no tiene préstamos pendientes</h2>
                <i class="fas fa-book-reader"></i>
                <a href="client" style="box-shadow: 1px 0.2px 3px #2d2d2d;border:unset;"><i class="fas fa-angle-left"></i> Regresar</a>

                
        </div>

<?php endif;?>
 



</div>