<style>
    .client_link {
        border-radius: 100px;
        background-color: rgba(87, 87, 87, 0.104);
    }
</style>



<div id="sect_title">
    <span id="addClient_btn">
        <img src="src/icons/add-person.png" class="addClient_btn" width="40%" style="margin:auto;" height="40%">

    </span>
    <h2>
        Clientes registrados
    </h2>

    <?php 
 
 include !file_exists("../../model/autoload.php")?"./model/autoload.php":"../../model/autoload.php";
      
        echo "<span class=\"client_cnt\"> ". Client::getClient()['cnt']."</span>";
      
?>

</div>


<?php include "client.search_bar.php" ?>

<div id="client_container">
    <!-- Lista de los clientes -->
    <?php include "client.card.php"; ?>
</div>

<?php include "add.client.php"; ?>
<?php include "edit.client.php"; ?>
<?php include "new.prest.php"; ?>