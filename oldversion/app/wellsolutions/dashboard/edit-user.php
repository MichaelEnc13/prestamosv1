<?php include 'mods/navbar.php' ?>
<?php include 'core/extract_active.php'; ?>



<div class="container">
<span class="toggleL "><i class="fas fa-bars"></i></span>

<form action="<?php htmlspecialchars("PHP_SELF") ?>" class="form-register" method="post">

        <h2>Editar usuario</h2>
        <?php include "core/registro.php" ?><br><br>

       <div class="fields">
            <label for="name"> <i class="fas fa-user-alt"></i></label>
            <input type="text"  id="name" placeholder="Nombre..." value="<?php echo base64_decode($_GET['name'])?>" name="fname" autocomplete="on" required>

            <label for="lname"> <i class="fas fa-user-alt"></i></label>
            <input type="text"  id="lname" placeholder="Apellido..." value="<?php echo base64_decode($_GET['lname'])?>" name="lname" autocomplete="on" required>
       </div>
       
     

          
        <div class="fields">
            
                <label for="ced"><i class="far fa-id-card"></i></label>
                <input type="text"  id="ced" placeholder="Cedula..."value="<?php echo base64_decode($_GET['ced'])?>" name="ced" autocomplete="on" required>

                <label for="matelil"><i class="fas fa-phone"></i> </label>
                <input type="tel"  id="tel" placeholder="Celular..." value="<?php echo base64_decode($_GET['cel'])?>" name="cel" autocomplete="on" required>


        </div>

        <div class="fields">
            <label for="matelil"><i class="fas fa-map-marker-alt"></i> </label>
            <input type="address"  id="tel" placeholder="Dirección..."value="<?php echo base64_decode($_GET['dir'])?>"name="location" autocomplete="on" required>
        </div>

       

    <br >
      
    


            <br>

        <button  class="btn r"  name="save"> Guardar <i class="far fa-save"></i></button>
        <br>

       

        </form>

</div>

<?php include 'mods/footer.php' ?>