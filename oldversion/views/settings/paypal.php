
    <script
        src="https://www.paypal.com/sdk/js?client-id=AeqiPKVTRZ-iyrUoDukhf9JH5vT51v52XRdV2OnthEEF1kbtfF7-5et_4Xd7s8OAS8i8XFw7SOLZCCge"> 
    </script>
  
  <?php if($block != true): ?>

  <div id="paypal-button-container"></div> 
  <span class="user" id="<?php echo $id = base64_encode(base64_encode($_SESSION['user']['user_id'])) ?>"></span>

   
 <?php  endif;?>
 


 
 