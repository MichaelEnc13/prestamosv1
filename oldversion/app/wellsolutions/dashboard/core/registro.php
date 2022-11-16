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
         $dia = date('j');
         $mes = date('n');
         $ano = date('o');
        $cmd = "INSERT INTO usuarios(user,fname,lname,mail,pass,dia,mes,ano,cedula,celular,ubicacion,user_status,user_status_value)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $pre_cmd = $conn -> prepare($cmd);
        $registro = $pre_cmd -> execute(
            array(

                $_POST['user'],
                $_POST['fname'],
                $_POST['lname'],
                $_POST['mail'],
                password_hash($_POST['pass'],PASSWORD_DEFAULT),
                $dia,
                $mes,
                $ano,
                $_POST['ced'],
                $_POST['cel'],
                $_POST['location'],
                'activo',
                '1'
               


            )
        );

    if ($registro) {

        header("location:add-user?added");
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