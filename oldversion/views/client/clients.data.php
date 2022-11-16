<style>
    .client_link{
        border-radius: 100px;
        background-color: rgba(87, 87, 87, 0.104);
    }
</style>

 

<h2 id="sect_title">Clientes registrados</h2>


<?php include "client.search_bar.php" ?>

<div id="client_container"> <!-- Lista de los clientes -->
    <?php  include "client.card.php";?>
</div>

<?php  include "add.client.php";?>
<?php  include "edit.client.php";?>
<?php  include "new.prest.php";?>
 
