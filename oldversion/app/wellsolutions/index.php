<?php include "mods/nav_top.php" ?>
<?php include "core/deudores.php" ?>



<?php if ($verificarEstado['user_status'] != "activo" &&  $verificarEstado['user_status'] != "pendiente"   ):?>

<?php include "mods/pagar_deuda.php" ?>

<?php else: ?>

<?php include "mods/body_index.php" ?>

<?php endif; ?>

<?php include "mods/footer.php" ?>