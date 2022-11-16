<div class="history-container">
    <h2 class="clt" style="color:rgb(58, 56, 56);text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;">Historial de pagos</h2>
    <p class="clt" style="color:rgb(58, 56, 56);"><?php echo $full_name['nombre']." ".$full_name['apellido'] ?></p>

    <?php if($historial):?>
    <div class="pagos-container">
  
       <?php foreach($historial as $historial): ?>
         
            <a href="factura?f&histo_id=<?php echo $historial['histo_id']?>">
                <div class="pagos">
                    <span>Fecha: <?php echo $historial['fecha']?></span>
                    <span>Monto prestado: <?php echo "$ ".number_format($historial['monto'])?></span>
                    <span>Cantidad: <?php echo "$ ".number_format($historial['montoEntregado']) ?></span>
                    <span>Forma de pago: <?php echo $historial['formaPago']?></span>
                </div>
            </a>

        <?php endforeach; ?>
    </div>

    <?php else:?>
       <div class="no-prestamos">
                <h2 class="clt" >No se han realizado pagos</h2>
                <i class="fas fa-book-reader"></i>
        </div>
    <?php endif;?>

</div>

<a href="client" class="returnFHpagos"><i class="fas fa-angle-left"></i> Regresar</a>