<div class="client_thumb">
<?php if($client['thumbnail'] != ""): ?>

<img src="src/loaded_photo/<?php echo $client['thumbnail'] ?>"  class="uploadedPhoto" alt=""  width="95%" style="margin:auto;" height="95%">
<span class="deletePhoto" onclick="deletePhoto(<?php echo $client['client_id'] ?>)">
    <img src="src/icons/photo-del.svg"   width="95%" style="margin:auto;" height="95%" alt="Imagen del cliente">
</span>

<span class="download">
    <a href="src/loaded_photo/<?php echo $client['thumbnail'] ?>" download><img src="src/icons/download-photo.svg"  width="95%" style="margin:auto;" height="95%" alt="imagen del documento" ></a>
</span>

<?php endif; ?>
<!-- PAra cargar la foto -->
    <form method="POST"  enctype="multipart/form-data" id="uploadForm_<?php echo $client['client_id'] ?>" onsubmit="return false;" >
    <div class="default">
        <input type="hidden"  name="clientPhoto" id="cid_<?php echo $client['client_id'] ?>" value="<?php echo $client['client_id'] ?>">
        <?php if($client['thumbnail'] == ""): ?> <label  for="addThumb_<?php echo $client['client_id'] ?>"> <img src="src/icons/photo.svg"  width="20%" style="margin:auto;" height="95%" alt="Imagen">  </label><?php endif; ?>
    </div>
        <input style="display: none;" class="selectFile" data-photo-in="<?php echo $client['client_id'] ?>"  type="file" name="uploadPhoto" id="addThumb_<?php echo $client['client_id'] ?>" onchange="loadPhoto('<?php echo $client['client_id'] ?>')">  

    </form>
        
   
</div>