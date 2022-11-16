<?php include "mods/nav_top.php";include "core/saldar.php" ?>

    <div class="addpay-container saldar ">
        <h2 class="clt"style=" color: rgb(56, 56, 56);">Saldar préstamo</h2><br><br>

                   


           <span>Monto prestado: <?php echo $prestamo['monto'] ?></span>
           <span>Interés: <?php echo $prestamo['interes'] ?></span>
           <span>Cuotas: <?php echo $prestamo['cuotas'] ?></span>
           <span>Cantidad por cuotas: <?php echo $prestamo['cantidadCuotas'] ?></span>
           <span>Total pagado: <?php echo $prestamo['totalPagado'] ?></span>

           <span>Cantidad restante: <?php echo $cantidadR;?></span>

            <br><br>
        <form action="" method="post" class="saldar-prestamo">
            <input placeholder="Ingresa el monto..." type="number" name="monto" id="" class="addpay-input" >

            <div class="addPay-btn-container">
                        <button class="btn" id="saldar" name="saldar">Saldar</button><br>
                   
                    <button class="btn history" style="width:20%;"><i class="fas fa-history"></i> </button><br>

            </div>   
            
        </form>

        
        <a href="index"><button class="btn return"><i class="fas fa-arrow-circle-left"></i>  </button></a>

       
    </div>

  
<?php include "mods/footer.php" ?>
