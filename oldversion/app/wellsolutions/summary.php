<?php include "mods/nav_top.php" ?>
<?php include 'core/summary.php' ?>
<div class="summary-container">
<h2 class="clt" style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;"> Resumen de <?php echo $mes_actual?> </h2><br> 
         <p class="clt"  style="color:#636363;text-align:center;font-size:18px;margin-top:-25px;margin-bottom:10px;"><i style="color:#f0ad4e;" class="fas fa-exclamation-triangle"></i> Las metricas se reinician cada mes</p> 

    <div class="inner-summary-container">

            <div class="summary-data">
                <span>Ganancias por intereses  </span>
                <span class="summary-info"><?php echo "$".number_format($monto) ?></span>
            </div>

            <div class="summary-data">
                <span>Dinero prestado este mes </span>
                <span class="summary-info"><?php echo "$".number_format($dinero_prestado) ?></span>
            </div>

    </div>


</div>



<?php include "mods/footer.php" ?>