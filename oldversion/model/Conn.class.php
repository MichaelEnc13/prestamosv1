<?php

use Conn as GlobalConn;

class Conn {

    
    private static $server = "mysql:host=localhost;dbname=u790594714_loans;";
    private static $db_user = "u790594714_loans132603";
    private static $db_pass = "Encarnacion132603@";
    
    private static $server_dev = "mysql:host=localhost;dbname=prestamosv2;";
    private static $db_user_dev = "root";
    private static $db_pass_dev = "Encarnacion132603";

    private static $conn = "";
    public static function conect(){
         
        if($_SERVER['SERVER_NAME'] != "localhost"):
            Conn::$conn = new PDO(Conn::$server,Conn::$db_user,Conn::$db_pass);
        else:         
            Conn::$conn = new PDO(Conn::$server_dev,Conn::$db_user_dev,Conn::$db_pass_dev);
        endif;

        if(Conn::$conn):
            return Conn::$conn ;
        endif;

 
        
    }




   

}

 

