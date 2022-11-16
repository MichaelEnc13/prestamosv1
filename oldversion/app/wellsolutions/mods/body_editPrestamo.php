<div class="form-container">

<?php include "core/editPrestamo.php"  ?>
    <h2 class="clt"style="color:rgb(58, 56, 56);;">Editar pr&eacute;stamo</h2>
    <form action="<?php  htmlspecialchars('PHP_SELF')?>" method="post">

        <!-- nombre y apellido -->

      
                <div class="nya">
                    <div class="ncontainer">
                            <label for="">Monto entregado:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()"  name="montoPrestado" id="montoPrestado" placeholder="..."  value="<?php echo base64_decode($_GET['mnt'])?>" required>

            
                    </div>

                    <div class="acontainer">
                        <label for="">% Interés:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()" name="interes" id="interes" placeholder="..." value="<?php echo base64_decode($_GET['i'])?>" required>    
                    </div>
                </div>
                           
                        
                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Meses:</label>
                        <input type="number"min="1" step="0.01" onkeyup="cntCuotas()" name="meses" id="meses" placeholder="..." value="<?php echo base64_decode($_GET['mss'])?>"required>
                    </div>

                    <div class="acontainer">
                        <label for="">Interés generado:</label>
                        <input type="number" min="1" name="InteresGenerado" id="InteresGenerado"  placeholder="..." value="<?php echo base64_decode($_GET['ig'])?>"required>
                    </div>

                </div>

                
                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Sumatoria:</label>
                        <input type="number" min="1"   name="sumatoria" id="sumatoria" placeholder="..." value="<?php echo base64_decode($_GET['sum'])?>" required>
                    </div>

                    <div class="acontainer">
                        <label for="">Cuotas:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()"  name="cuotas" id="cuotas"  placeholder="..."value="<?php echo base64_decode($_GET['cu'])?>" required>
                    </div>

                </div>


                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Total:</label>
                        <input type="number" min="1"   name="total" id="total" placeholder="..." value="<?php echo base64_decode($_GET['tl'])?>">
                    </div>

                    

                </div>


        
       

        <button name="epDone" class="btn"><i class="fas fa-save"></i> Guardar</button>
        <a href="prestamosClientes?c=<?php echo $_GET['c']?>" style="box-shadow: 1px 0.2px 3px #2d2d2d;border:unset;"><i class="fas fa-angle-left"></i> Regresar</a>

    </form>
</div>