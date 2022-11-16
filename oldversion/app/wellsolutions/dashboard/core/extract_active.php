<?php 

include "conn.php";
//error_reporting(0);

$fecha_hoy = intval(date('j'));

// buscar conteo de todos
$cmd1 = "SELECT * FROM usuarios";
$pre_cmd1 = $conn -> prepare($cmd1);
$pre_cmd1 -> execute();
$all =  $pre_cmd1 -> rowCount(); 


// buscar conteo  por estado
$cmd1 = "SELECT * FROM usuarios WHERE user_status = 'activo' ";
$pre_cmd1 = $conn -> prepare($cmd1);
$pre_cmd1 -> execute(array($fecha_hoy,$fecha_hoy,$fecha_hoy));
$count_actives =  $pre_cmd1 -> rowCount(); 

// buscar conteo por estado

$cmd2 = "SELECT * FROM usuarios WHERE user_status = 'pendiente' OR dia = ? OR dia + 1 = ? OR dia + 2 = ?   ";
$pre_cmd2 = $conn -> prepare($cmd2);
$pre_cmd2 -> execute(array($fecha_hoy,$fecha_hoy,$fecha_hoy));
$count_pendient =  $pre_cmd2 -> rowCount(); 

// buscar conteo por estado

$cmd3 = "SELECT * FROM usuarios WHERE user_status = 'suspendido'";
$pre_cmd3 = $conn -> prepare($cmd3);
$pre_cmd3 -> execute();
$count_suspended =  $pre_cmd3 -> rowCount(); 



// buscar activos
if (!isset($_GET['p']) && !isset($_GET['s']) ) {

    $cmd = "SELECT * FROM usuarios WHERE user_status = 'activo'  AND dia != ? OR dia +1 != ?  OR dia + 2 != ? ";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute(array($fecha_hoy,$fecha_hoy,$fecha_hoy));
    $actives =  $pre_cmd -> fetchall(); 
}


// buscar pendientes
if (isset($_GET['p']) && !isset($_GET['s']) ) {

    $cmd = "SELECT * FROM usuarios WHERE user_status = 'pendiente' OR dia = ? OR dia + 1 = ? OR dia + 2 = ?  AND user_status != 'activo' AND  user_status != 'suspendido'  ";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute(array($fecha_hoy,$fecha_hoy,$fecha_hoy));
    $actives =  $pre_cmd -> fetchall(); 
}


// buscar suspendidos
if (isset($_GET['s']) && !isset($_GET['p']) ) {

    $cmd = "SELECT * FROM usuarios WHERE user_status = 'suspendido'";
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute();
    $actives =  $pre_cmd -> fetchall(); 
}


// accion de activar usuario

if (isset($_GET['activar'])) {
    $cmd = "UPDATE usuarios SET user_status = 'activo' , user_status_value = '1'  WHERE id = ?";
    $pre_cmd = $conn -> prepare($cmd);
   

    if ($pre_cmd -> execute(array($_GET['id']))) {
        header("location:home");
    }
}


// accion de pendiente  usuario

if (isset($_GET['pendiente'])) {
    $cmd = "UPDATE usuarios SET user_status = 'pendiente', user_status_value = '0' WHERE id = ?";
    $pre_cmd = $conn -> prepare($cmd);
    if ($pre_cmd -> execute(array($_GET['id']))) {
        header("location:home?p");
    }
}



// accion de suspender usuario

if (isset($_GET['suspender'])) {
    $cmd = "UPDATE usuarios SET user_status = 'suspendido', user_status_value = '0' WHERE id = ?";
    $pre_cmd = $conn -> prepare($cmd);
    if ($pre_cmd -> execute(array($_GET['id']))) {
        header("location:home?s");
    }
}

// eliminar usuario

if (isset($_POST['delete'])) {
    $cmd = "DELETE FROM usuarios WHERE id = ?";
    $pre_cmd = $conn -> prepare($cmd);
    if ($pre_cmd -> execute(array(base64_decode($_GET['id'])))) {
        header("location:home");
    }
}

// Editar usuario   
if (isset($_POST['save'])) {
    $cmd = "UPDATE usuarios SET fname = ? , lname = ? , cedula = ? , celular = ? , ubicacion = ? WHERE id = ?";
    $pre_cmd = $conn -> prepare($cmd);

     

    if ($pre_cmd -> execute(array(
       
        $_POST['fname'],
        $_POST['lname'],
        $_POST['ced'],
        $_POST['cel'],
        $_POST['location'],
        base64_decode($_GET['id'])


    ))) {
        header("location:home");
    }
}

// buscar  usuario

if (isset($_GET['search']) ) {
    $busqueda = $_GET['q'];
    
    $cmd = "SELECT * FROM usuarios WHERE fname LIKE "."'%".$busqueda."%'"." OR lname LIKE "."'%".$busqueda."%'".
    " OR cedula LIKE "."'%".$busqueda."%'"." OR celular LIKE "."'%".$busqueda."%'"." OR user LIKE "."'%".$busqueda."%'" ;
    
  
    
    $pre_cmd = $conn -> prepare($cmd);
    $pre_cmd -> execute();
    $resultado =  $pre_cmd -> fetchall(); 

    if ($resultado) {
        $resultado = serialize($resultado);
        header("location:home?q=".$resultado);
    }else
    {
        header("location:home?q=0"); 
    }

}




?>


