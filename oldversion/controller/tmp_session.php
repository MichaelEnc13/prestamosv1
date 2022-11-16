<?php

if(isset($_POST['pid'])):
//para crear las session de ver los tickets
    if(session_status() != 2):
        session_start();
    endif;
    $_SESSION['pid'] = $_POST['pid'];
   echo "tickets";
    
endif;

if(isset($_POST['cid'])):
    if(session_status() != 2):
        session_start();
    endif;
    $_SESSION['cid'] = $_POST['cid'];
   echo "loans";
    
endif;

if(isset($_GET['sw'])):
    echo "true";
endif;
 
 