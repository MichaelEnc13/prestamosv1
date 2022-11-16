<?php 
if(!file_exists("model/autoload.php")):
    include "model/autoload.php";
endif;
Prestamos::updateLoanStatus();

