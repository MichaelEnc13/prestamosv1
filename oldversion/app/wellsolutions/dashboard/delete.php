<?php include 'mods/navbar.php' ?>
<?php include 'core/extract_active.php'; ?>

<div class="container">
<span class="toggleL "><i class="fas fa-bars"></i></span>
       <div class="delete">
         <h2>Se eliminará a <span style="color:#c4001d;"><?php echo base64_decode($_GET['name']) ?></span> de la base de datos</h2>

         <p style=" font-family: 'Pathway Gothic One', sans-serif;font-size:20px;">¿Seguro que lo quieres eliminar?</p>
         
<br>
           <div class="delete_btn_container">
                 <a href="home"><button>Regresar</button></a>

                 <form action="" method="post">

                        <button name="delete">Eliminar</button>
                 </form>
           </div>             
       </div>
</div>
 

 

<?php include 'mods/footer.php' ?>