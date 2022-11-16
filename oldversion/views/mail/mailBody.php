<?php 
error_reporting(0);
    ob_start();
?>

 

<div class="container" style="       background-color:#3283fa;
        padding: 40px;">
<div
 class="campain"
 
 style="
 box-sizing:border-box;
    background-color:white;
    width: 60%;
    margin: auto;
    text-align:center;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color:white;
    padding:20px;
    
    ">
 


<?php 
    $url = "";
    if($action == "pass"):
        $url = "textToPass.php";
        elseif($action == "new"):
        $url = "textToNew.php"; 
    endif;

    include $url;

?>


</div>


</div>

</div>




<?php 
 
    $html = ob_get_clean();
?>
