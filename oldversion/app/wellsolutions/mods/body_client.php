<h2 class="clt" style="color:#636363;text-align:center;box-shadow:1px 0px 3px #616161;padding:2px;border-radius:5px;margin-top:10px;"><i class="fas fa-portrait"></i> Clientes </h2>
    
    <?php// if(!isset($_GET['clientes']) && !isset($_GET['buscarCliente']) ):?>
    
         <br> <p class="clt"  style="color:#636363;text-align:center;font-size:18px;margin-bottom:-15px;margin-top:-10px;">Tienes: <?php echo $cantidad_clientes;?> cliente(s)  <?php if(isset($_GET['buscarCliente']) ):?> encontrado   <?php else: ?> registrados <?php endif; ?>(s)</p> 
 

<form action="" method="GET" style="margin-botton:20px;">

        <div class="busqueda">
           <div style="box-shadow: 1px 1px 5px #696969;"   class="btn reload"><a href="client"> <i class="fas fa-sync-alt"></i></a></div>
         <input  style="box-shadow: 1px 1px 5px #696969;" type="text" name="buscarCliente" id="" placeholder="Buscar cliente..." autocomplete="off">
         <button style="box-shadow: 1px 1px 5px #696969;" class="btn buscar"><i class="fas fa-search"></i></button>
        </div>
    </form>

<!-- Buscar cliente registrado especifico -->

<div class="cliente-container">
<?php if(isset($_GET['fnd'])): ?>

        <?php if($_GET['fnd']!="0"):?>
          
            <?php   foreach(unserialize($_GET['clientes']) as $clientes):?>
            
            <div class="clientes">
            <small class="clt" style="font-size:17px;">Cliente ID:  <strong><?php echo $clientes['id']?> </strong></small>
            <strong><span style="font-size:25px;color:rgb(107,107,107);"><?php echo $clientes['nombre']." ". $clientes['apellido'] ?></span></strong>
            <span>Cédula: <?php echo $clientes['cedula'] ?></span>
            <span>Celular: <?php echo $clientes['celular'] ?></span>
             <?php  include "core/cntDebt.php"; ?>
            <span>Cantidad de prestamos realizados: <?php echo $cntDebt?></span>
            <a href="prestamosClientes?c=<?php echo $clientes['cedula']?>"><button class="delete"><i class="fas fa-eye"></i> Ver préstamos pendientes</button></a>
            <a href="addClient?addDebt&nombre=<?php echo $clientes['nombre']."&apellido=".$clientes['apellido']."&cedula=".$clientes['cedula']."&celular=".$clientes['celular']?> "><button class="btn delete"><i class="fas fa-hand-holding-usd"></i> A&ntilde;adir nuevo pr&eacute;stamo</button></a> 
            <!-- <a href="prestamos?nombre=<?php // echo $clientes['nombre']."&apellido=".$clientes['apellido']."&cedula=".$clientes['cedula']."&celular=".$clientes['celular']?> "><button class="btn delete"><i class="fas fa-edit"></i>  Reajustar pr&eacute;stamo existente</button></a>  -->
                        <a href="editClient?&clientID=<?php echo base64_encode($clientes['id'])."&nombre=".base64_encode($clientes['nombre'])."&apellido=".base64_encode($clientes['apellido'])."&ced=".base64_encode($clientes['cedula'])."&cel=".base64_encode($clientes['celular'])?> "> <button class="btn delete" id="delete"><i class="far fa-edit"></i>Editar</button></a>    

            <a href="editClient?&clientID=<?php echo $clientes['id']."&nombre=".$clientes['nombre']." ".$clientes['apellido']."&ced=".$clientes['cedula']?> "> <button class="btn delete" id="delete"><i class="far fa-edit"></i>Editar</button></a>    

            <a href="will-delete?&clientID=<?php echo $clientes['id']."&nombre=".$clientes['nombre']." ".$clientes['apellido']."&ced=".$clientes['cedula']?> "> <button class="btn delete" id="delete"><i class="fas fa-user-minus"></i> Eliminar cliente</button></a>    
            <a href="history?c=<?php echo $clientes['cedula']?> "> <button class="btn delete" id="delete"> <i class="fas fa-history"></i> Recibos </button></a>        
            
             
             
        </div>
        <?php endforeach;?>
            <?php else:?>
                <div class="no-prestamos">
                <h2 class="clt" >Nada encontrado</h2>
                <i class="fas fa-search"></i>
                <a href="addclient"><i class="fas fa-user-plus"></i> A&ntilde;adir cliente </a>
                 <a href="client">  Mostrar todo</a>

        </div>
        <?php endif;?>
        

</div>
    <?php else: ?>

    <!-- extraccion de todos los clientes registrados -->
<div class="cliente-container">
        <?php if($clientes):?>
    <?php  foreach ($clientes as $clientes): ?>
        <div class="clientes">
            <small class="clt" style="font-size:17px;">Cliente ID:  <strong><?php echo $clientes['id']?> </strong></small>
            <strong><span style="font-size:25px;color:rgb(107,107,107);"><?php echo $clientes['nombre']." ". $clientes['apellido'] ?></span></strong>
            <span>Cédula: <?php echo $clientes['cedula'] ?></span>
            <span>Celular: <?php echo $clientes['celular'] ?></span>
            
            <?php  include "core/cntDebt.php"; ?>
            <span>Cantidad de prestamos realizados: <?php echo $cntDebt ?></span>
            <a href="prestamosClientes?c=<?php echo $clientes['cedula']?>"><button class="delete"><i class="fas fa-eye"></i> Ver préstamos pendientes</button></a>
            <a href="addClient?addDebt&nombre=<?php echo $clientes['nombre']."&apellido=".$clientes['apellido']."&cedula=".$clientes['cedula']."&celular=".$clientes['celular']."&cliente_id=".$clientes['id']?> "><button class="btn delete"><i class="fas fa-hand-holding-usd"></i> A&ntilde;adir nuevo pr&eacute;stamo</button></a> 
            <!-- <a href="prestamos?nombre=<?php // echo $clientes['nombre']."&apellido=".$clientes['apellido']."&cedula=".$clientes['cedula']."&celular=".$clientes['celular']?> "><button class="btn delete"><i class="fas fa-edit"></i>  Reajustar pr&eacute;stamo existente</button></a>  -->
            
                         <a href="editClient?&clientID=<?php echo base64_encode($clientes['id'])."&nombre=".base64_encode($clientes['nombre'])."&apellido=".base64_encode($clientes['apellido'])."&ced=".base64_encode($clientes['cedula'])."&cel=".base64_encode($clientes['celular'])?> "> <button class="btn delete" id="delete"><i class="far fa-edit"></i>Editar</button></a>    

                 
            <a href="will-delete?&clientID=<?php echo $clientes['id']."&nombre=".$clientes['nombre']." ".$clientes['apellido']."&ced=".$clientes['cedula']?> "> <button class="btn delete" id="delete"><i class="fas fa-user-minus"></i> Eliminar cliente</button></a>    
            <a href="history?c=<?php echo $clientes['cedula']?> "> <button class="btn delete" id="delete"> <i class="fas fa-history"></i> Recibos </button></a>        
        
        </div>
        <?php endforeach; ?>

        <?php else:?>
             <div class="no-prestamos">
                <h2 class="clt" >Aún no tienes clientes registrados</h2>
                <i class="fas fa-user-times"></i><br>
                <a href="addClient"><i class="fas fa-user-plus"></i> A&ntilde;adir cliente </a>
        </div>
        <?php endif;?>

</div>

    <?php endif; ?>

