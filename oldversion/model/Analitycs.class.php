<?php 
include "autoload.php";
if(session_status() != 2) session_start();
class Analitycs{
    public static function getAmountMonth(){
        $cmd = "SELECT SUM(sumatory) as smt FROM prestamos WHERE pmonth = ? AND user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array(
                        intval(date('m')),
                        $_SESSION['user']['user_id']
                    ));
        $sum = $cmd -> fetch();
        return $sum['smt'];
    }
    public static function getAmountLastMonth(){
        $cmd = "SELECT SUM(sumatory) as smt FROM prestamos WHERE pmonth = ? AND user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array(
                            intval(date('m')-1),
                            $_SESSION['user']['user_id']
                        ));
        $sum = $cmd -> fetch();
        return $sum['smt'];
    }
    public static function amountToday(){
        $cmd = "SELECT SUM(amount) as amt FROM pagos WHERE date_paid = ? AND user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array(date('d/m/Y'), $_SESSION['user']['user_id']));
        $sum = $cmd -> fetch();
        return $sum['amt'];
    }
    //monto estimado a cobrar el dia actual.
    public static function stimated(){
        $cmd = "SELECT SUM(total) as amt FROM prestamos WHERE nextTime = ? AND user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array(date('d/m/Y'), $_SESSION['user']['user_id']));
        $sum = $cmd -> fetch();
        return $sum['amt'];
    }
    public static function average(){
        $cmd = "SELECT AVG(amount) as avgLoanAmount FROM prestamos WHERE user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($_SESSION['user']['user_id']));
        $sum = $cmd -> fetch();
        return $sum['avgLoanAmount'];
    }
    public static function lastLoan(){
        $cmd = "SELECT  *  FROM prestamos WHERE user_id = ? ORDER BY prest_id DESC LIMIT 1 ";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($_SESSION['user']['user_id']));
        $sum = $cmd -> fetch();
        return $sum['date_p'];
    }

    public static function maxLoan(){
        $cmd = "SELECT MAX(amount) as maxLoanAmount FROM prestamos  WHERE user_id = ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($_SESSION['user']['user_id']));
        $sum = $cmd -> fetch();
        return $sum['maxLoanAmount'];
    }
}
    
