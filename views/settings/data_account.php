<h2 id="sect_title" > <span id="returnBack"  ><i class="fas fa-chevron-left"></i></span> Datos de la cuenta</h2>

<div class="data_container">
<?php  if(date('d') == $_SESSION['user']['days']): ?>
    <div class="factBan">Ha llegado la fecha de facturacion</div> 
 <?php endif;?> 
    <div class="mainInf">
        <h1 class="uName"><?php echo $_SESSION['user']['uName']." ". $_SESSION['user']['lName'] ?> </h1>
        <h4 class="uMail"><i class="far fa-envelope"></i> <?php echo $_SESSION['user']['uMail']?></h4>
        <h4 class="uMail"><i class="fas fa-mobile-alt"></i> <?php echo $_SESSION['user']['uNumber']?></h4>

    </div>
    
 
    <div class="secondInf">
        <h4 style="width:90%;font-family:var(--txt);color:gray;font-size:20px;">Datos del plan</h4>

 <!--            <div class="data">
                <span>Plan</span>
                <span class="inset">PRO</span>
            </div> -->

            <div class="data">
                <span>Precio</span>
                <span class="inset">USD $<?php echo $_SESSION['user']['payAmount']?></span>
            </div>
            <div class="p_data">
                <div class="data">
                    <span>Fecha de facturación</span>
                    <s> Día <?php echo $_SESSION['user']['days']?> de cada mes</s>
                </div>
                <div class="data p_way">
                    <span><i class="fas fa-lock"></i> Formas de pago</span>
                    <div class="p_way_btn">
                    <?php  include "paypal.php"?>
                                           

                    </div>
                </div>
              <!--   <button class="cancel">Cancelar suscripción</button> -->
            </div>
    </div>





</div>
 

