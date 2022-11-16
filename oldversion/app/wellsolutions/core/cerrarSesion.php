<?php 
include "conn.php";
session_start();
if (isset($_SESSION['user'])) {
    
    unset($_SESSION['userID']);
    unset($_SESSION['user']);
    unset($_SESSION['userClient']);
    unset($_SESSION['name']);
    
    header("location:../login");
}