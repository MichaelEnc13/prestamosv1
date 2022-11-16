
 <div class="factura-container">

        <div id="factura" class="factura-data-container">



            <div class="logotipo-factura">

                <img src="img/logo.png" alt="">

            </div>



            <h3 style="text-align:center;" class="clt">Recibo de pago</h3>



            <p style="text-align:center;margin:auto;"> <b>Fecha:</b> <?php echo $historial['fecha'] ?></p><br><br>



            <p style="font-size:20px;">Recibí de  <strong><?php echo $full_name['nombre']." ".$full_name['apellido'] ?></strong>  la suma de <strong> <?php echo "$ ".number_format($historial['montoEntregado'])?></strong>

            como pago de un préstamo de <strong><?php echo "$ ".number_format($historial['monto'])?></strong>.

            </p>

            <br>



            <p style="font-size:20px;">Pagos realizados:</P >

            <span><?php echo $historial['cuotasRestantes']." de ".$historial['cuotas']?></span>

            <br><br>

            <p style="font-size:20px;">Método de pago utilizado:</P >

            <span><?php echo $historial['formaPago']?></span>



            <br><br>

            

            <h5 style="font-size:20px;">Firma responsable:</h5>

            <br><br>



            <strong class="sign"><i><?php echo $_SESSION['name']?>.</i></strong>



        </div>



        <buttom onclick="returnBack()" class="returnFHpagos"><i class="fas fa-angle-left"></i> Regresar</buttom>
     
            <buttom onclick="captura()" class="returnFHpagos">Guardar como PDF</buttom>
     
      <div id="capture"></div>
 
    </div>
 
 

