<h2 class="clt" style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;margin-top:10px;"><i class="far fa-edit"></i> Editar datos del clientes </h2>

<div class="form-container">
 <form action="<?php  htmlspecialchars('PHP_SELF')?>" method="post">

        <!-- nombre y apellido -->
        
     
        <div class="nya">
                <div class="ncontainer">
                    <label for="">Nombre:</label>
                    <input type="text"  name="fname" id="" value="<?php echo base64_decode($_GET['nombre'])?>" required>
                </div>

            <div class="acontainer">
                <label for="">Apellido:</label>
                <input type="text" name="lname" id="" value="<?php echo  base64_decode($_GET['apellido'])?>" required>
            </div>
        </div>

        <div class="nya">
           <div class="ncontainer">
            <label for="">Cedula:</label>
                <input type="text" name="cedula" id="" value="<?php echo  base64_decode($_GET['ced'])?>" required>
           </div>

            <div class="acontainer">
                
                <label for="">Celular:</label>
                <input type="text" name="celular" id="" value="<?php echo  base64_decode($_GET['cel'])?>" required>
            </div>
        </div>
        
          <button name="save" class="btn"><i class="fas fa-save"></i> Guardar</button>
          <a href="client" style="box-shadow: 1px 0.2px 3px #2d2d2d;border:unset;"><i class="fas fa-angle-left"></i> Regresar</a>

    </form>
    
    </div>