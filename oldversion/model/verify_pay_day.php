<?php 
if(!file_exists("autoload.php")):
    include "model/autoload.php";
endif;
Prestamos::updateLoanStatus();

