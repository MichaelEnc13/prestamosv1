<?php 
    
    
    include "../../model/autoload.php";
    $clientInf = Client::searchAclient($_GET['id']);


?>

<span class="close_window" >
        <img src="src/icons/close.svg" class="close_window">
    </span>
<h2>Editar información </h2>

<form method="GET" id="edit_client_form"    onsubmit="return false">
<label for="">Nombre:</label>
         <input type="text" name="edit_name" placeholder="..." value="<?php echo $clientInf ['fname'] ?>">

        <label for="">Apellido:</label>
         <input type="text" name="edit_lName" placeholder="..." value="<?php echo $clientInf ['lname'] ?>">

        <label for="">Celular:</label>
         <input type="text" name="edit_cel" id="nPhone" placeholder="..." value="<?php echo $clientInf ['numberPhone'] ?>">

        <label for="">Documento de Identidad:</label>
         <input type="text" name="edit_id_doc" placeholder="..." value="<?php echo $clientInf ['id_doc'] ?>">

        <label for="">Dirección:</label>
         <input type="text" name="edit_dir" placeholder="..." value="<?php echo $clientInf ['direction'] ?>">

         <button class="btn" id="edit_client" onclick="edit(<?php echo $_GET['id']?>)">Editar</button>
</form>