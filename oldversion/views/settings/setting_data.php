 

<h2 id="sect_title" > <span id="returnBack"  ><i class="fas fa-chevron-left"></i></span>Configuraci&oacute;n</h2>

<div class="settings_container">
<form id="settings"   enctype="multipart/form-data"  >
    <label for="arrier">Porcentaje: interés moratorio</label>
     
    <input id="arrier" type="number"  name="amount_arriers" min="0"  value="<?php echo($_SESSION['user']['amount_arriers'])?>">

<!--     <label for="dayArrier">Número de días para aplicar mora</label>
    <input type="number" id="dayArrier" name="daysToArriers" min="0"  value="<?php echo($_SESSION['user']['daysToArriers'])?>">
 -->
    <label >Activar notificaciones</label>

    <div>
        <span>Si</span>
        <input type="radio" name="notification" value="1" <?php echo ($_SESSION['user']['notification']) == 1?"checked":""; ?> >
        <span>No</span>
        <input type="radio" name="notification" value="0"  <?php echo ($_SESSION['user']['notification']) == 0?"checked":""; ?>>
    </div>



    <button id="save">Guardar configuración</button>
</form>

<form id="editLogo" method="get"   enctype="multipart/form-data">
        <label for="">Logo de tu negocio:</label><br>
        <small>Se recomienda una imagen en formato: PNG</small>
        <div class="userLogo">
            <?php if($_SESSION['user']['logo'] != ""):?>
                <img src="src/loaded_photo/<?php echo $_SESSION['user']['logo']?>" alt="">
            <?php endif; ?>
            
            <label for="selectImg" class="selectPic"><i class="far fa-edit"></i></label>
        </div>
        <input style="display:none;" id="selectImg" name="logo" type="file">
</form>


</div>
