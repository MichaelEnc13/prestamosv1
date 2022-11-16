
    <div class="addpay-container">
        <h2 class="clt"style=" color: rgb(56, 56, 56);">Nuevo pago</h2><br><br>

                    <?php if ($prestamo['totalPagado']>=$prestamo['sumatoria']):?>
                         <span style="display:inline;color:#22bb33;"><i class="fas fa-check-circle"></i> Completo</span><br><br>

                    <?php else: ?>
                        <span style="display:inline;color:#f0ad4e;"><i class="fas fa-exclamation-triangle"></i> Pendiente</span><br><br>
                    <?php endif; ?>


           <span>Monto prestado: <?php echo "$".number_format($prestamo['monto']) ?></span>
           <span>Monto a pagar: <?php echo "$".number_format($prestamo['sumatoria']) ?></span>
           <span>Interés: <?php echo $prestamo['interes']."%" ?></span>
           <span>Cuotas: <?php echo $prestamo['cuotasRestantes'] ?> de <?php echo $prestamo['cuotas'] ?></span>
           <span>Cantidad por cuotas: <?php echo "$".number_format($prestamo['total']) ?></span>
           <span>Total pagado: <?php echo "$".number_format( $prestamo['totalPagado'] )?></span>

            <br><br>
        <form action="" method="post">
        
        <?php if($prestamo['totalPagado']<=$prestamo['sumatoria']    ):?>
        
               <label for="">Fecha:</label>
        <input type="date" id="start" name="fecha"
         autocomplete   required
       min="2020-09-01" max="2050-12-31">
            <input placeholder="Ingresa el monto..." type="number" name="monto"  id="" title="Ingresa un monto" class="addpay-input" required >

            <select name="formaPago" id="" title="Debes elegir la forma de pago" required>
                    <option value="">Elige una forma de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia bancaria</option>
                    <option value="Cheque">Cheque</option>
            </select>
        <?php else: ?>
            <?php endif; ?>
            <div class="addPay-btn-container">
                
                

                     <?php if($prestamo['totalPagado']<=$prestamo['sumatoria']   ):?>
                         <button class="btn"><i class="fas fa-plus"></i> Aplicar pago   </button><br>
                    <?php endif; ?> 

                    <a  href="history?c=<?php echo $prestamo['cedula']?>"  ><div class="btn history" style="width:100%;"><i class="fas fa-history"></i> </div></a><br>

            </div>   
            
        </form>

        
         <button onclick="returnBack()" class="btn return"><i class="fas fa-angle-left"></i> Regresar</button>
    </div>