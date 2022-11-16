<link rel="stylesheet" href="css/login.css">
<h2 class="clt" style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;margin-top:10px;"><i class="far fa-edit"></i> Cambiar contrase&ntilde;a</h2>

<div class="form-container">
 <form action="<?php  htmlspecialchars('PHP_SELF')?>" method="post">

        <!-- nombre y apellido -->
        
     
        
           <label for="pass"><i class="fas fa-key"></i> Contrase&ntilde;a nueva: </label>
        <input type="password" id="pass"placeholder="..."  name="pass"  autocomplete="off" required>
        
        <label for="cpass"><i class="fas fa-key"></i> Confirmar contrase&ntilde;a: </label>
        <input type="password" id="cpass"placeholder="..."  name="Cpass"  autocomplete="off" required>
        
   
      
          <button name="save" class="btn"><i class="fas fa-save"></i> Actualizar</button>
          <a href="https://wellsolutions.me" style="box-shadow: 1px 0.2px 3px #2d2d2d;border:unset;"><i class="fas fa-angle-left"></i> Regresar</a>

    </form>
    
    </div>
    
    <?php if(isset($_GET['noMatch'])): ?>
    <div class="noExiste">
        <i class="fas fa-times"></i>
            <p>Las contrase単as no coinciden</p>
    </div>
<?php endif; ?>