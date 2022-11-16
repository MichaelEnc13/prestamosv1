<?php 

include !file_exists("../model/autoload.php")?"model/autoload.php": "../model/autoload.php";
if(isset($_POST['add_prest'])):
   echo Prestamos::add(
        $_POST['amount'],
        $_POST['interest'],
        $_POST['month'],
        $_POST['paymode'],
        $_POST['int_generated'],
        $_POST['sumatory'],
        $_POST['dues'],
        $_POST['total'],
        $_POST['client_id']
    ) == true?true:false;
endif;

if(isset($_GET['payment'])):  //para agregar un abono al préstamo.
 
    
    //el tipo de pago '0' corresponde a los abonos. 
     if(Prestamos::addPayment($_GET['prest_id'],$_GET['amount']) == true):
       echo Prestamos::savePay($_GET['cid'],$_GET['prest_id'],$_GET['amount'],0,0,0,0,0,"")==true? true:false;
        //include "../views/loan/loans.client.php";
     else:
        echo false; 
    endif;


 
endif; 

if(isset($_GET['edit_prest']) == true):  //para editar préstamo.
 
    echo Prestamos::edit(
        $_GET['amount'],
        $_GET['interest'],
        $_GET['month'],
        $_GET['paymode'],
        $_GET['int_generated'],
        $_GET['sumatory'],
        $_GET['dues'],
        $_GET['total'],
        $_GET['client_id'],
        $_GET['prest_id']
    )== true?true:false;

 
endif;

if(isset($_GET['delete'])):
    if( Prestamos::delete($_GET['delete'])):
      echo  Prestamos::deleteTicket($_GET['delete'])==true?true:false;
    endif;


endif;
if(isset($_GET['addPay'])): //para agregar un pago al préstamo.
    if( Prestamos::addPay(
        $_GET['prest_id'],
        $_GET['client_id'],
        $_GET['amount'],
        $_GET['apply_payment'],
        $_GET['dues'])):
        echo Prestamos::savePay($_GET['client_id'],$_GET['prest_id'],$_GET['amount'],$_GET['lastPayment'], $_GET['dues'],$_GET['paid_dues'],$_GET['arriers'],1,
        $_GET['payMethod'])==true? true:false;
     
    endif;


endif;


