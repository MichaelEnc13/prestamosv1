<div class="suspended">
    <img src="src/icons/pago.svg" alt="">


    <?php if($_SERVER['PHP_SELF'] != "/account.php" ):?>

        <h1>Hola, <?php   echo $_SESSION['user']['uName'] ?></h1>
        <h2>Tu cuenta ha sido suspendida por retraso en el pago  </h2>
        <p>Para poder continuar, debes de realizar el pago.</p>

    <?php else:?>

        <h2>Proceda a realizar el pago </h2>
        <div id="paypal-button-container"></div>
        <span class="user" id="<?php echo $id = base64_encode(base64_encode($_SESSION['user']['user_id'])) ?>"></span>
    
    <?php endif;?>

    <?php if( $_SERVER['PHP_SELF'] != "/account.php"):?>
        <a href="account" id="logOut" class="nav_link"><span><i class="fas fa-dollar-sign"></i> Proceder al pago</span></a>
    <?php endif;?>
</div>