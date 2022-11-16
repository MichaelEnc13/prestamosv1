<?php 
 
include !file_exists("../model/autoload.php")?"model/autoload.php": "../model/autoload.php";
if(isset($_POST['add'])):
    if(Client::clientInf( $_POST['cel'],$_POST['id_doc'])):
        echo false;
    else:
        Client::add( $_POST['name'],$_POST['lName'],$_POST['cel'],$_POST['id_doc'],$_POST['dir']);
        include "../views/client/client.card.php";
    endif;

 

endif;

if(isset($_GET['delete'])):

   if( Client::deleteClient($_GET['delete']) == true):
    echo "true";
   else:
    echo "false";
   endif;

    
endif;


if(isset($_GET['edit'])):

   if( Client::edit($_GET['edit'], $_GET['name'],$_GET['lName'],$_GET['cel'],$_GET['id_doc'],$_GET['dir']) == true):
    echo "true";
   else:
    echo "false";
   endif;

    
endif;

if(isset($_GET['search'])):
    include "../views/client/client.card.php";
endif;





 
if(isset($_POST['clientPhoto'])):
  echo  Client::loadPhoto($_POST['clientPhoto'],$_FILES['uploadPhoto']);  
endif;

if(isset($_GET['dp'])):
  echo  Client::deletePhoto($_GET['dp']);  
endif;

 

