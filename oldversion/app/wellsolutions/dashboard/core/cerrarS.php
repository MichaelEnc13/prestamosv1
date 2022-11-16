<?php  

session_start();

if (isset($_SESSION['superUser'])) {
    try {
        unset($_SESSION['superUser']);
        header("location:../login?logout=1");
    } catch (\Throwable $th) {
        
    }

}


?>


