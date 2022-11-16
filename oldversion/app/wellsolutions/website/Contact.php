<?php include 'modules/header.php' ?>
<div class="all_container">

 

    <div class="contact">
  
      
    </div>    

    <div class="advantage contact-text" id="mail">
             <h2>Contacto</h2>
             <span style="font-size:16px;" >Contáctanos para hacer una solicitud de registro</span>
    </div>

    <div class="inner_contact">
         

         <div class="mail" >
             <h2> <i  style="font-size:30px;"  class="far fa-paper-plane"></i> Escribenos por correo</h2>
             <br><br>
             <div class="dm_container">
                 <form action="" method="post">
                 

                     <label for="">Ingresa tu nombre</label>
                     <input type="text" placeholder="..." name="name">

                     <label for="">Ingresa tu correo</label>
                     <input type="email" placeholder="Example@mail.com" name="mail">

                     <label for="">Escribe el mensaje</label>
                     <textarea placeholder="..."  name="message" id="" cols="30" rows="10" required></textarea>

                     <button class="btn" name="send">Enviar</button>
                     <?php include 'res/mail/mail.php'?>
                     <?php if(isset($_GET['done']))
                            {
                                echo "<p class=\"sent\">Tu mensaje se ha enviado!</p><p class=\"sent\">Pronto te estaremos dando respuesta.</p>";
                            }
                     ?>
                 </form>
             </div>
         </div>

         <div class="phone">
         
         <h2>   Via movil</h2>
         <br><br>
            <span><i class="fas fa-phone-alt"></i> +1(849) 344-5432</span>
            <br>
            <span><i class="fab fa-whatsapp"></i> +1(829) 445-5432</span>
            <br>
            <span>ó escanea el código</span>
            <img src="img/a2.jpg" alt="">

            <br>
  
         
             
         </div>
     </div>


</div>

<?php include 'modules/footer.php' ?>