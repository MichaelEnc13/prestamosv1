<div class="pagar_deuda">


    
         <?php if(isset($_GET['cancel'])): ?>
                <div class="noExiste">
                    <i style="color: #ff1a1a;"class="fas fa-times"></i>
                        <p>Pago cancelado</p>
                </div>
        <?php endif; ?>
        
         
         <?php if(isset($_GET['success'])): ?>
                <div class="noExiste">
                   <i style="color: #1aff1a" class="far fa-check-circle"></i>
                        <p>Pago realizado con éxito</p>
                        <p>Estamos confirmando su pago, recibirá un correo electrónico avisándole que ya puede seguir disfrutando del servicio</p>

                </div>
        <?php endif; ?>
        <br><br>
    <p style="font-size:20px;" >Elige una forma de pago:</p> 
    
    <div class="pay_ways">
        
    
         
        
        <div class="pay_ways_paypal">
            <h2 >PayPal</h2>
             <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BAHNFJ3VY2J4L">
               <i class="fab fa-cc-paypal"></i>
             </a> 
        </div>
        
         <div class="pay_ways_card">
         <h2 >Tranferencia bancaria</h2>

            
                <i class="far fa-credit-card"></i>
             
        </div>
      

    </div>
      <p>NOTA1: si usas PayPal, debes poner tu nombre de usuario al momento de ser requerido </p>
        <p>NOTA2: Para las transferencias, en el "Concepto" debes poner tu nombre de usuario </p>
</div>   
