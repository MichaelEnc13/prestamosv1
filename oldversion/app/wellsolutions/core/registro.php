<?php 

include "conn.php";
if (isset($_POST['registrarse'])) {

$verificar = "SELECT * FROM usuarios WHERE user = ? OR mail = ?";
$pre_verificar = $conn -> prepare($verificar);
$pre_verificar -> execute(array(
    $_POST['user'],
    $_POST['mail']
));

$verificado = $pre_verificar->fetch();

    if (!$verificado) {
       $pass =$_POST['pass']
        $cmd = "INSERT INTO usuarios(user,fname,lname,mail,pass)VALUES(?,?,?,?,?)";
        $pre_cmd = $conn -> prepare($cmd);
        $registro = $pre_cmd -> execute(
            array(

                $_POST['user'],
                $_POST['fname'],
                $_POST['lname'],
                $_POST['mail'],
               $pass


            )
        );

    if ($registro) {

        header("location:login");
    }

}else
{
    $conn = null;
    echo '   <div style="width:90%;" class="noExiste">
    <i class="fas fa-times"></i>
        <p>Ese usuario ya existe,  intenta otra vez.</p>
        </div>';
}


}

?>