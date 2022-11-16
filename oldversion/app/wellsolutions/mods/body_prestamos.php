<?php include "core/seeDebts.php" ?>


    <div class="prestamos-container">
    <?php foreach($deudas as $deudas): ?>
        <div class="prestamos">
            <small>Fecha: <?php echo $deudas['fecha'] ?></small>
            <span style="font-size:30px;"><?php echo $_GET['nombre']." ".$_GET['apellido'] ?></span>
            <span>Monto: <?php echo $deudas['monto'] ?></span>
            <span>Interés: <?php echo $deudas['interes'] ?></span>
            <span>Cuotas: <?php echo $deudas['cuotas'] ?></span>
            <span>Cuotas de: <?php echo $deudas['cantidadCuotas'] ?></span>
            <span>Total pagado</span>
            <span>Cuotas restantes</span>

            <button class="btn addpay ">Modificar <i class="fas fa-edit"></i></button>
        </div>
    <?php endforeach; ?>
</div><!-- Prestaoms container -->