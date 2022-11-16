<?php  

const User = 'admin';
const Pass = 'Encarnacion132603@';




if (isset($_POST['in'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user == User && $pass === Pass) {
        session_start();
        $_SESSION['superUser'] = User;
        header("location:home");
    }else
    {
        header("location:?i");
    }
    
    
}

?>






