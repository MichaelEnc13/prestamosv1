<div class="suspended">
<img src="src/icons/pago.svg" alt="">

<h1>Tu cuenta ha sido suspendida por retraso en el pago</h1>
 <p>Para poder continuar, debes de realizar el pago.</p>
 <script
        src="https://www.paypal.com/sdk/js?client-id=AeqiPKVTRZ-iyrUoDukhf9JH5vT51v52XRdV2OnthEEF1kbtfF7-5et_4Xd7s8OAS8i8XFw7SOLZCCge"> 
    </script>
<div id="paypal-button-container"></div>
<span class="user" id="<?php echo $id = base64_encode(base64_encode($_SESSION['user']['user_id'])) ?>"></span>

<span id="logOut_suspended" class="nav_link"><span><i class="fas fa-sign-out-alt"></i> Cerrar sesión</span></span>

 

</div>

