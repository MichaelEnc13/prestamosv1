<?php
 
if(isset($_POST['pid'])):

    if(session_status() != 2):
        session_start();
    endif;
    $_SESSION['pid'] = $_POST['pid'];
   echo "tickets.php";
    
endif;

if(isset($_POST['cid'])):
    if(session_status() != 2):
        session_start();
    endif;
    $_SESSION['cid'] = $_POST['cid'];
   echo "loans.php";
    
endif;

if(isset($_GET['sw'])):
    echo "true";
endif;
 
