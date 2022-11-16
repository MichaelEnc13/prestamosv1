
    <?php if(!isset($_GET['p'] ) && !isset($_GET['s'] )): ?>
        <style>
           .activo
           { 
            background-color: #22bb342e;
           } 
        </style>
    <?php  endif;?>
      
    <?php if(isset($_GET['p'] ) && !isset($_GET['s'] )): ?>
        <style>
           .pendiente
           { 
            background-color: #f0ac4e48;
           } 
        </style>
    <?php  endif;?>

    <?php if(!isset($_GET['p'] ) && isset($_GET['s'] )): ?>
        <style>
           .suspendido
           { 
            background-color: #bb21233c;
           } 
        </style>
    <?php  endif;?>