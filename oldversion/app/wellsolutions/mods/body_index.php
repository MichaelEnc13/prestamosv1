    <div class="clientes-prestamos-container">
                            <h2 class="clt" style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;"><i class="fas fa-money-check-alt"></i> Préstamos 
</h2><br> 
        <div class="clientes-prestamos-body">
     
        
        
        <?php   if ($deudores):?>
    <?php foreach($deudores as $clientesConDeuda): ?>

                <?php 
                    $cmd1 = "SELECT * FROM clientes WHERE cedula = ? AND userClient = ?";
                    $pre_cmd1 = $conn -> prepare($cmd1);
                    $pre_cmd1 -> execute(array($clientesConDeuda['cedula'],$_SESSION['userClient']));
                    $clientes = $pre_cmd1 -> fetch();

                    $ver_cant = "SELECT * FROM deudores WHERE cedula = ? AND totalPagado<sumatoria   AND userClient = ? ";
                    $pre_cmd_ver_cant = $conn -> prepare($ver_cant);
                    $pre_cmd_ver_cant -> execute(array($clientes['cedula'],$_SESSION['userClient']));
                    $cntPrestamos = $pre_cmd_ver_cant -> rowCount();
                    
                    
                ?>

                <a href="prestamosClientes?c=<?php echo base64_encode($clientesConDeuda['cedula'])?>">
                 <div class="clientes-con-prestamos">
                    <h3 style="color:rgb(107,107,107);" class="clt"><?php echo $clientes['nombre']." ".$clientes['apellido'] ?></h3>
                    <p class="clt" style="color:#393939;font-size:18px;">Cantidad de préstamos: <?php echo $cntPrestamos ?> </p>
                  </div>
                </a>
            
            <?php endforeach; ?>
    <?php else: ?>

        <div class="no-prestamos">
                <h2 class="clt" >Nada pendiente</h2>
                <i class="fas fa-book-reader"></i>
        </div>
            <?php endif ?>
        </div>
        
    </div>