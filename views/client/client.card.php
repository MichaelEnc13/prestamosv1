

<?php 
//El primer include es para se carga la vista por defecto o mediante el ajax de javascript
//La segunda para que se cargue mediente las busquedas de clientes.
 include !file_exists("../../model/autoload.php")?"./model/autoload.php":"../../model/autoload.php";
        $clients = isset($_GET['search'])?Client::searchClient($_GET['search'])['clientList']: Client::getClient()['clientList'];
 
        if($clients != null):
            foreach($clients as $client):
?>



<div class="client_card" id="cid_<?php echo $client['client_id'] ?>" >


<?php include "clientPhoto.php" ?>


    <span class="clientId">  <?php echo $client['client_id'] ?></span>
    <span class="clientName">
    <?php echo $client['fname']." ".$client['lname'] ?>
       
    </span><br>

    <div class="clientInf">
        <span class="">
        Documento de identidad:
        <?php echo $client['id_doc']; ?>
        </span>
        
        <span>
            Contacto:
            <?php echo $client['numberPhone']; ?> 
        </span>

        <span>
            Residencia:
            <?php echo $client['direction']; ?>
        </span>
    </div>


    <div class="client_card_controls">

        
        <button  class="actionsToClient addDebt"   title=" Añadir pr&eacute;stamo">
            <!-- para añadir el nuevo -->
        <img  src="src/icons/anadir-evento.svg"  id="<?php echo $client['client_id'] ?>" title="<?php echo $client['fname'].' '.$client['lname']?>" class="addDebtInner" width="95%" style="margin:auto;" height="95%">
           <!--  Añadir pr&eacute;stamo -->
        </button>

 
        <button class="see_pres load-prest"    title="Ver préstamo">
                <img  src="src/icons/view.svg"  class="btnAction" alt="Botton icon" id="<?php echo $client['client_id'] ?>" width="95%" style="margin:auto;" height="95%">
                    <!-- Ver pr&eacute;stamos -->
         </button>


    <!--     <button>
        <img src="src/icons/recibo.svg" alt="">
            Ver recibos
        </button> -->

        <button class="sendMessage" title="Enviar mensaje">
         <img  src="src/icons/whatsapp.svg" name="<?php echo $client['numberPhone']?>" width="95%" style="margin:auto;" height="95%">
          <!--   Enviar mensaje -->
        </button>

        <button  class="edit_client_btn"    title="Editar informaci&oacute;n">
            <img  src="src/icons/usuario.svg" class="edit_client" id="<?php echo $client['client_id'] ?>"  width="95%" style="margin:auto;" height="95%">
           <!-- Editar informaci&oacute;n -->
        </button>
        
        <button title=" Eliminar cliente">
        <img  src="src/icons/borrar-usuario.svg" id="<?php echo $client['client_id'] ?>"  name="<?php echo $client['fname'] ?>" class="delete_client" width="95%" style="margin:auto;" height="95%">
           <!--  Eliminar cliente -->
        </button>
    </div>

   
</div>

<?php
endforeach;
else:
?>
        <div class='noPrest'>
            Sin resultados
         <img src='src/icons/sin-contenido.svg'>
        </div>
<?php endif; ?>

