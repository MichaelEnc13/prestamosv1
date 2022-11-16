<?php include "mods/nav_top.php";?>


<div class="sureDelete">

<i class="fas fa-exclamation-circle"></i>
<p>
    ¿Seguro que quieres eliminar a: <strong><?php echo $_GET['nombre']?></strong> de la lista de clientes?
</p>

<div class="sureDeleteBtn">
    <a href="core/seeClient?delete&clientID=<?php echo $_GET['clientID']."&cedula=".$_GET['ced']?> "><button class="btn deleteCliente ">Eliminar</button></a>
    <a href="client"><button class="btn closeDelete">Regresar</button></a>
</div>
</div>
 


<?php include "mods/footer.php" ?>