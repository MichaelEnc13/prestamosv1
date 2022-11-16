<h2 
    style="font-family: Franklin Gothic;
            color: #3283fa;
                    "
>Recuperar acceso</h2>
<img src="https://dotsell.website/prestamos/src/appIcon/icon-192.png" alt="">

<div class="info" style="
  background-color: #3283fa;
    padding: 10px;
    margin: 10px;
    border-radius: 10px;font-size:17px;">
<p>Hola <?php echo $check['uName']?></p>,


</p>Hemos recibido una solicitud para la recuperacion del acceso.
Si no has hecho esta solicitud, por favor elimina o omite este correo,
De lo contrario, para recuperar tu acceso a la cuenta <b>Dotsell:prestamos</b>
Haz click en el siguente enlace.</p>

<a href="<?php echo $_SERVER['SERVER_NAME']."/auth?m=".base64_encode($check['uMail'])."&target=recover"?>"><button
style="
    padding: 10px;
    background-color: white;
    color:  #3283fa;
    border: none;
  
    cursor: pointer;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"
>Recuperar acceso</button></a>