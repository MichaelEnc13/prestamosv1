<div class="desing">
        <h1 class="logo"><img src="src/appIcon/icon-192.png" alt=""></h1>   
        <span class="action">Iniciar sesión</span>
    </div>
    <form id="login" class="form" method="GET" onsubmit="return false"> 
     <label for=""><span class="icon"><i class="far fa-user"></i></span><input type="text" id="userName" name="userName" placeholder="Nombre de usuario" ></label>
     <label for=""><span class="icon"><i class="fas fa-key"></i></span><input type="password" id="uPass" name="uPass" placeholder="Contraseña"></label>
     <span id="exist"></span>
     <a class="forgot_pass" href="?recover=true">Olvidaste tu contraseña?</a>
     <button class="log_btn">Iniciar sesión</button>
     <span class="hasOne">Si no tienes una cuenta, <a class="ir" href="">Registrate</a></span>
  
</form>
 

 