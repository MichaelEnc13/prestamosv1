<?php include 'mods/navbar.php' ?>
<?php include 'core/extract_active.php'; ?>

     
<div class="container">
<span class="toggleL "><i class="fas fa-bars"></i></span>
<form action="<?php htmlspecialchars("PHP_SELF") ?>" class="form-register" method="post">

        <h2>Registrar usuario</h2>
        <?php include "core/registro.php" ?><br><br>
<?php
if(isset($_GET['added'])):
?>
<div style="width:90%;" class="noExiste">
   <i style="font-size:30px;"class="far fa-check-circle"></i>
        <p>Usuario registrado correctamente.</p>
        </div>
        
<?php endif;?>   
       <div class="fields">
            <label for="name"> <i class="fas fa-user-alt"></i></label>
            <input type="text"  id="name" placeholder="Nombre..." name="fname" autocomplete="on" required>

            <label for="lname"> <i class="fas fa-user-alt"></i></label>
            <input type="text"  id="lname" placeholder="Apellido..." name="lname" autocomplete="on" required>
       </div>
       
        <div class="fields">
            
                <label for="user"> <i class="fas fa-user-alt"></i></label>
                <input type="text"  id="user" placeholder="Usuario..." name="user" autocomplete="on" required>

                <label for="mail"><i class="fas fa-envelope"></i></label>
                <input type="email"  id="mail" placeholder="Correo electrónico..." name="mail" autocomplete="on" required>
        </div>


          
        <div class="fields">
            
                <label for="ced"><i class="far fa-id-card"></i></label>
                <input type="text"  id="ced" placeholder="Cedula..." name="ced" autocomplete="on" required>

                <label for="matelil"><i class="fas fa-phone"></i> </label>
                <input type="tel"  id="tel" placeholder="Celular..." name="cel" autocomplete="off" required>


        </div>

        <div class="fields">
            <label for="matelil"><i class="fas fa-map-marker-alt"></i> </label>
            <input type="address"  id="tel" placeholder="Dirección..." name="location" autocomplete="off" required>
        </div>

       

    <br >
      
    <div class="fields">
        <label for="pass"><i class="fas fa-key"></i> </label>
        <input type="password" id="pass"placeholder="Contrase&ntilde;a ..."  name="pass"   required>
        
        <label for="cpass"><i class="fas fa-key"></i> </label>
        <input type="password" id="cpass"placeholder="Confirmar contrase&ntilde;a..."  name="Cpass"   required>
    </div>



            <br>

        <button  class="btn r"  name="registrarse"> Registrar </button>
        <br>

       

        </form>

</div>

<?php include 'mods/footer.php' ?>