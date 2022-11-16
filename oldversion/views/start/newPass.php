<div class="desing">
<h1 class="logo"><img src="src/appIcon/icon-192.png" alt=""></h1>   
        <span class="action">Reestablecida</span>
    </div>
<?php 

if($_GET['newPass']!="done"):
    

?>
  
<form id="newPass" class="form" method="GET" onsubmit="return false"> 
    <label for=""><span class="icon"><i class="fas fa-key"></i></span><input type="password" id="nPass" name="pass" placeholder="Ingresa tu nueva contraseña" autocomplete="off" ></label>
    <label for=""><span class="icon"><i class="fas fa-key"></i></span><input type="password" id="rPass" name="rpass" placeholder="Repite la contraseña" autocomplete="off"></label>
<div id="exist"></div><button class="changePass">Cambiar contraseña</button>

   
</form>

 <?php else: ?>
    <div class="mailSent">
    <img class="emailImg" src="src/icons/secure.svg" alt="">
    <p>Hemos reestablecido tu acceso.</p>
    <a href="login"><button  style="width:30%" class="btnStart">Iniciar sesión</button></a>
    </div>
   
 

 <?php endif; ?>
 

 