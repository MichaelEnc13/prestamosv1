<?php if(!isset($_GET['addDebt'])): ?>
<?php include "core/addClient.php"; ?>
<div class="form-container">
 

    <h2 class="clt" style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;width:90%;margin:auto;margin-top:10px;">Añadir cliente <i class="fas fa-user-plus"></i></h2>
    <form action="<?php  htmlspecialchars('PHP_SELF')?>" method="post">

        <!-- nombre y apellido -->

        <div class="nya">
                <div class="ncontainer">
                    <label for="">Nombre:</label>
                    <input type="text" name="fname" id="" placeholder="..." required>
                </div>

            <div class="acontainer">
                <label for="">Apellido:</label>
                <input type="text" name="lname" id="" placeholder="..." required>
            </div>
        </div>

        <div class="nya">
           <div class="ncontainer">
            <label for="">Cedula:</label>
                <input type="text" name="cedula" id="" placeholder="..." required>
           </div>

            <div class="acontainer">
                
                <label for="">Celular:</label>
                <input type="text" name="celular" id="" placeholder="..." required>
            </div>
        </div>
        <label for="">Fecha:</label>
        <input type="date" id="start" name="fecha"
         autocomplete
       min="2020-09-01" max="2050-12-31">
        
<!-- PROGRAMACION DE ESTOS BOTONES -->


            <!-- <label class="comoPagar" for="">Para ser pagado cada:</label>

            <select class="comoPagarSelect" name="" id="" required>
                <option value="">Elige una opción</option>
                <option value="">Semanal</option>
                <option value="">Quincenal</option>


            </select> -->

      

      
            <div class="nya">
                    <div class="ncontainer">
                            <label for="">Monto entregado:</label>
                        <input type="number" min="1"  name="montoPrestado" id="montoPrestado" placeholder="..." required>

            
                    </div>

                    <div class="acontainer">
                        <label for="">% Interés:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()" name="interes" id="interes" placeholder="..." required>    
                    </div>
                </div>

                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Meses:</label>
                        <input type="number"min="1" step="0.01" onkeyup="cntCuotas()" name="meses" id="meses" placeholder="..." required>
                    </div>

                    <div class="acontainer">
                        <label for="">Interés generado:</label>
                        <input type="number" min="1" name="InteresGenerado2" id="InteresGenerado"  placeholder="..." required>
                    </div>

                </div>

                
                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Sumatoria:</label>
                        <input type="number" min="1"   name="sumatoria" id="sumatoria" placeholder="...">
                    </div>

                    <div class="acontainer">
                        <label for="">Cuotas:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()"  name="cuotas" id="cuotas"  placeholder="..." required>
                    </div>

                </div>


                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Total:</label>
                        <input type="number" min="1"   name="total" id="total" placeholder="...">
                    </div>

                    

                </div>


      
        

       

        <button name="newClient" class="btn"><i class="fas fa-plus"></i>A&ntilde;adir</button>
                        <a href="client" style="box-shadow: 1px 0.2px 3px #2d2d2d;border:unset;"><i class="fas fa-angle-left"></i> Regresar</a>

    </form>
</div>

<?php else: ?>
<div class="form-container">

<?php include "core/addDebt.php"  ?>
    <h2 class="clt"style="color:rgb(58, 56, 56);;">A&ntilde;adir prestamo a <span style="color:rgb(58, 56, 56);text-decoration:underline;"><?php echo $_GET['nombre']." ".$_GET['apellido']?></span> </h2>
    <form action="<?php  htmlspecialchars('PHP_SELF')?>" method="post">

        <!-- nombre y apellido -->

      
                <div class="nya">
                    <div class="ncontainer">
                            <label for="">Monto entregado:</label>
                        <input type="number" min="1"  name="montoPrestado" id="montoPrestado" placeholder="..." required>

            
                    </div>

                    <div class="acontainer">
                        <label for="">% Interés:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()" name="interes" id="interes" placeholder="..." required>    
                    </div>
                </div>
                             <label for="">Fecha:</label>
                 <input type="date" id="start" name="fecha"
                 autocomplete required
                 min="2020-09-01" max="2050-12-31">
                        
                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Meses:</label>
                        <input type="number"min="1" step="0.01" onkeyup="cntCuotas()" name="meses" id="meses" placeholder="..." required>
                    </div>

                    <div class="acontainer">
                        <label for="">Interés generado:</label>
                        <input type="number" min="1" name="InteresGenerado" id="InteresGenerado"  placeholder="..." required>
                    </div>

                </div>

                
                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Sumatoria:</label>
                        <input type="number" min="1"   name="sumatoria" id="sumatoria" placeholder="..." required>
                    </div>

                    <div class="acontainer">
                        <label for="">Cuotas:</label>
                        <input type="number" min="1"  onkeyup="cntCuotas()"  name="cuotas" id="cuotas"  placeholder="..." required>
                    </div>

                </div>


                <div class="nya">
                    <div class="ncontainer">
                        <label for="">Total:</label>
                        <input type="number" min="1"   name="total" id="total" placeholder="...">
                    </div>

                    

                </div>


        
       

        <button name="addDebtBtn" class="btn"><i class="fas fa-plus"></i> A&ntilde;adir</button>
        <a href="client" style="box-shadow: 1px 0.2px 3px #2d2d2d;border:unset;"><i class="fas fa-angle-left"></i> Regresar</a>

    </form>
</div>
<?php endif; ?>



