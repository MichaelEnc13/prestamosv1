<?php include "mods/nav_top.php";?>


<?php if ($verificarEstado['user_status'] != "activo" &&  $verificarEstado['user_status'] != "pendiente"   ):?>

<?php include "mods/pagar_deuda.php" ?>

<?php else: ?>

<?php include "mods/body_addClient.php";?>

<?php endif; ?>





<?php include "mods/footer.php" ?>

<?php if(isset($_GET['exists'])): ?>
    <script>
        swal("Atencion!", "Ya este cliente está registrado!", "info");
    </script>
 <?php endif; ?>
 