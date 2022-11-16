 <?php 

 include "autoload.php";//para llamar a la clase de conexion.
 if(session_status() != 2) session_start();
 class Prestamos {

     
    public static function add($amount,$interest,$month,$paymode,$int_generated,$sumatory,$dues,$total,$client_id){
        $cmd = "INSERT INTO prestamos
        (amount,interest,month,paymode,int_generated,sumatory,dues,total,date_p,day,pmonth,client_id,user_id)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $cmd = Conn::conect() -> prepare($cmd);
          $done = $cmd -> execute(
                array(
                    $amount,$interest,$month,$paymode,$int_generated,$sumatory,$dues,$total,date("d/m/Y"),date("d"),date("m"),$client_id,$_SESSION['user']['user_id']
                )
            );
            $prestId =Prestamos::getLastRow($client_id);
            Prestamos::firstPayDate($prestId,$client_id);
           
            return $done;
          
    }
 
    //se optiene el ultimo id insertado
    public static function getLastRow($cid){
        $cmd = "SELECT * FROM prestamos WHERE  client_id = ? ORDER BY prest_id DESC LIMIT 1" ;
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($cid));
        $lastRow = $cmd -> fetch();
        return $lastRow['prest_id'];
    }

    //actualizar fecha del primer pago

    public static function firstPayDate($prest_id,$client_id){

        $nextPay = Prestamos::calNextPay($prest_id,$client_id)['nextPay'];
        $future = Prestamos::calNextPay($prest_id,$client_id)['future'];
        
        $cmd = "UPDATE prestamos SET nextPay = ?, nextTime = ? WHERE client_id = ? AND prest_id = ?" ;
        $cmd =  Conn::conect()  -> prepare($cmd);
        $cmd -> execute(
            array(
                $nextPay,$future,$client_id,$prest_id
            )
        );

    }

    public static function getCLientLoans($id){
        $cmd = "SELECT * FROM prestamos WHERE client_id = ?  HAVING user_id = ? ORDER BY amount_paid >= sumatory  DESC";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $cmd -> execute(  array($id,$_SESSION['user']['user_id'])); 
        return array(
            "list" => $cmd -> fetchAll(),
            "cant" => $cmd -> rowCount()
        );
    }
    
    public static function edit( $amount,$interest,$month,$paymode,$int_generated,$sumatory,$dues,$total,$client_id,$prest_id){
        $cmd = "UPDATE prestamos SET amount = ?,interest = ?,month = ?,paymode = ?,int_generated = ?,sumatory = ?,dues = ?,total = ? WHERE client_id = ? AND prest_id = ?" ;
            $cmd =  Conn::conect()  -> prepare($cmd);
            $done = $cmd -> execute(
                array(
                    $amount,$interest,$month,$paymode,$int_generated,$sumatory,$dues,$total,$client_id,$prest_id
                )
            );
            return $done?true:false;

    }

    //eliminar el prestamo 
    public static function delete($id){
        $cmd = "DELETE FROM prestamos WHERE prest_id = ? ";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $done = $cmd -> execute(array($id));
        return $done?true:false;
    }
    //Borra todos los prestamos de un cliente
    public static function deleteAll($id){
        $cmd = "DELETE FROM prestamos WHERE client_id = ? ";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $done = $cmd -> execute(array($id));
        return $done?true:false;
    }



    public static function deleteTicket($id){
        $cmd = "DELETE FROM pagos WHERE prest_id = ? ";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $done = $cmd -> execute(array($id));
        return $done?true:false;
    }
    //aplicar un pago al préstamo.
    public static function addPay($prest_id,$client_id,$amount,$payment,$dues){
         
        $cmd = "UPDATE prestamos 
                                SET lastPayDate = ? ,
                                lastPayDay = ?,
                                nextPay = ? ,
                                nextTime = ? ,
                                pay_status = 1 ,
                                amount_paid  = amount_paid + ?,
                                paid_dues = paid_dues + ?,
                                payment = ?
                                WHERE prest_id = ? AND client_id = ?" ;
        $cmd =  Conn::conect()  -> prepare($cmd);
        $nextPay = Prestamos::calNextPay($prest_id,$client_id)['nextPay'];
        $future = Prestamos::calNextPay($prest_id,$client_id)['future'];
        $done = $cmd -> execute(
            array(date('d/m/Y'),date('z'),$nextPay,$future,$amount,$dues,$payment,$prest_id,$client_id)
        );
        return $done?true:false;
         
    }
    //calcular la proxima fecha de pago.
    public static function calNextPay($prest_id,$client_id){
        $paymode = 0;
        $cmd = "SELECT * FROM prestamos WHERE prest_id = ? AND client_id = ?";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $cmd -> execute(  array($prest_id,$client_id));
        $paymode = $cmd -> fetch();
        $paymode = $paymode['paymode'];

        $nextPay = "";
        $days =  date("z");
        $future = "";
            if($paymode == 1 ):
                $nextPay =  intval( $days) + 30; 
                $future =  date("d/m/Y",strtotime("+30 day"));
                elseif($paymode == 2):
                    $nextPay =  intval( $days) + 15; 
                    $future =  date("d/m/Y",strtotime("+15 day"));
                        elseif($paymode == 4):
                            $nextPay =  intval( $days) + 7; 
                            $future =  date("d/m/Y",strtotime("+7 day"));
                            elseif($paymode == 0):
                                $nextPay =  intval( $days) + 1;
                                $future =  date("d/m/Y",strtotime("+1 day")); 

            endif;
            
        
        return array(
            "nextPay" =>  $nextPay,
            "future" => $future
        );
    }


    //aplicar un abono 
    public static function addPayment($prest_id,$amount){
        $cmd = "UPDATE prestamos SET payment  = payment + ? WHERE prest_id = ?" ;
        $cmd =  Conn::conect()  -> prepare($cmd);
        $done = $cmd -> execute(
            array($amount,$prest_id)
        );
        return $done?true:false;
    }
   //Esto es para guardarlo en el historial, no actualiza nada en la tabla
    // de prestamos.
    public static function savePay($client_id,$prest_id,$amount,$payment,$dues,$paid_dues,$arriers,$payType,$payMethod){
        $cmd = "INSERT INTO pagos
        (client_id	,prest_id,	amount,payment,	dues,paid_dues,	arriers	,payType,payMethod,date_paid,user_id	)
        VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $cmd = Conn::conect() -> prepare($cmd);
        return  $cmd -> execute(
                array(
                    $client_id,$prest_id,$amount,$payment,$dues,$paid_dues,$arriers,$payType,$payMethod,date("d/m/Y"),$_SESSION['user']['user_id']
                )
            );
    }

    public static function getLoansInfo($pid){
        $cmd = "SELECT * FROM prestamos WHERE prest_id = ?";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $cmd -> execute(  array($pid)); 
        return array(
            "info" => $cmd -> fetch(),
           
        );
    }
    //extraer los tickets o recibos
    public static function tickets($pid){
        $cmd = "SELECT * FROM pagos WHERE  user_id = ? AND prest_id = ? ORDER BY paid_id DESC ";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $cmd -> execute( array( $_SESSION['user']['user_id'], $pid)); 
        return array(
            "list" => $cmd -> fetchAll(),
            "info" => $cmd -> fetch()
        );
    }
    public static function getTicketsInfo($pid){
        $cmd = "SELECT * FROM pagos WHERE paid_id = ? AND user_id = ?";
        $cmd =  Conn::conect()  -> prepare($cmd);
        $cmd -> execute(  array($pid,$_SESSION['user']['user_id'])); 
        return array(
        
            "info" => $cmd -> fetch()
        );
    }
  
    public static function getPendientClient(){
        $cmd = "SELECT DISTINCT client_id FROM prestamos WHERE sumatory > amount_paid  AND user_id = ? ORDER BY nextTime ASC";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($_SESSION['user']['user_id']));
        return $cmd -> fetchAll();
    }
    public static function filter($dataFilter){
        $cmd = "SELECT DISTINCT client_id FROM prestamos WHERE 
                                                     sumatory > amount_paid
                                                     AND user_id = ?
                                                     ORDER BY ? DESC ";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($_SESSION['user']['user_id'],$dataFilter));
        return $cmd -> fetchAll();
    }

    //para extraer la cantidad de los prestamos pendientes en el INICIO
    public static function getPendientClientCount($id){
        $cmd = "SELECT * FROM prestamos WHERE  sumatory > amount_paid AND client_id =  ?";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($id));
        return array(
            "all" => $cmd -> fetchAll(),
            "cant" => $cmd -> rowCount()
           

        );
    }

    /* 
        Elegir el metodo de pago para saber que dia le toca pagar a un cliente.
        Mensual: elige la fecha en la que el préstamo se ha creado.
        Semanal:Elige la fecha de cuando se creó el préstamo y le va sumando 7 hasta
        hasta que se cumplan las cuotas.
        Diario: Tomando los datos y cada 24 horas verificar.

        calcular la proxima fecha de pago obteniendo los dias del año
    */
    // Mostrar los clientes que pagan mensualmente.



    public static function getPayDay($id,$day){
        $cmd = "SELECT * FROM prestamos  
                                WHERE client_id = ?
                                AND paymode = ?
                                AND day = ?
                                AND amount_paid < sumatory";
        $cmd = Conn::conect() -> prepare($cmd);
        $cmd -> execute(array($id,1,$day));
        return $cmd -> fetch();
    }


    public static function updateLoanStatus(){
        $clients = Client::getClient()['clientList'];
        foreach($clients as $client): //buscar todos los clientes registrados
           $loans =  Prestamos::getPendientClientCount($client['client_id'])['all'];
           foreach($loans as $loan): //Verificar los péstamos pendientes del cliente
                if($loan['lastPayDate'] != date("d/m/Y") && $loan['nextTime'] == date("d/m/Y") ): //si el pago no se realizó HOY se actualiza el estatus.
                   if($loan['pay_status'] == 1):
                        $cmd = "UPDATE prestamos SET pay_status = 0 WHERE prest_id = ? AND client_id = ?";
                        $cmd = Conn::conect()  -> prepare($cmd);
                        $cmd -> execute(array($loan['prest_id'],$loan['client_id']));
                    endif;
                endif;
           endforeach;
        endforeach;
    }

   /* Aplicar mora por retraso */
   public static function applyArrier($arriers,$client_id,$loan_id){
     
    $cmd = "UPDATE prestamos SET arriers = arriers + ? WHERE prest_id = ? AND client_id = ?";
    $cmd =  Conn::conect()  -> prepare($cmd);
    $cmd -> execute(array($arriers,$client_id,$loan_id));

}



}
