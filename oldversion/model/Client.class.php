<?php
    include "autoload.php";
    if(session_status() != 2) session_start();
     
    class Client{
        public static function add($name, $lname, $id_doc, $cel, $dir){
            $date =  date("D d/m/Y");
           
            $cmd = "INSERT INTO client(fname,lname,numberPhone,id_doc,direction,reg_date,user_id)
                                VALUES(?,?,?,?,?,?,?)";
            $cmd = Conn::conect() -> prepare($cmd);
            $cmd -> execute(
                array($name, $lname, $id_doc, $cel, $dir,$date,$_SESSION['user']['user_id'])
            );                      
                    
            return true;
        }
        public static function clientInf($id_doc, $cel){
            $cmd = "SELECT * FROM client WHERE numberPhone = ? OR id_doc = ? HAVING user_id = ?";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $cmd -> execute(
                array($id_doc, $cel,$_SESSION['user']['user_id'])
            ); 
            return $cmd -> fetchAll();
        }
        public static function getClient(){

            $cmd = "SELECT * FROM client WHERE user_id = ? ORDER BY client_id DESC";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $cmd -> execute(array($_SESSION['user']['user_id'])); 
            $clientList = $cmd -> fetchAll();
            $cnt = $cmd -> rowCount();
            return array(
                "clientList" => $clientList,
                "cnt"=>$cnt
            );
        }
        public static function searchClient($search){
            $cmd = "SELECT * FROM client WHERE client_id LIKE '%$search%'
                                            OR fname LIKE '%$search%' 
                                            OR lname LIKE '%$search%' 
                                            OR numberPhone LIKE '%$search%'
                                            OR id_doc LIKE '%$search%'
                                            OR direction LIKE '%$search%' HAVING user_id = ? ORDER BY client_id DESC";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $cmd -> execute(array($_SESSION['user']['user_id'])); 
            $done = $clientList = $cmd -> fetchAll();
            $cnt = $cmd -> rowCount();
            return array(
                "clientList" => $clientList,
                "cnt"=>$cnt,
                "done"=>$done
            );
        }
        public static function deleteClient($id){
            $cmd = "DELETE FROM client WHERE client_id = ? ";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $done = $cmd -> execute(array($id));
            Prestamos::deleteAll($id);
            return $done?true:false;
            
        }
        public static function searchAclient($id){  
            $cmd = "SELECT * FROM client WHERE client_id = ? AND user_id = ?";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $cmd -> execute( array($id,$_SESSION['user']['user_id'])); 
            return $cmd -> fetch();
     
        }
        public static function edit($id,$name, $lname, $id_doc, $cel, $dir){
            $cmd = "UPDATE client SET fname  = ? ,lname = ? ,numberPhone = ? ,id_doc = ? ,direction = ? WHERE client_id = ? " ;
            $cmd =  Conn::conect()  -> prepare($cmd);
            $done = $cmd -> execute(
                array($name, $lname, $id_doc, $cel, $dir,$id)
            );
            return $done?true:false;

        }
        public static function getLastPhoto($id){
            $cmd = "SELECT thumbnail FROM client WHERE client_id = ? HAVING user_id = ?";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $cmd -> execute(  array($id,$_SESSION['user']['user_id'])); 
            $thumb = $cmd -> fetch();
            return $thumb['thumbnail'];
        }

        public static function loadPhoto($cid,$pht){
            $phtName = $pht['name'];
            $toSaveName = $cid."_".$phtName;
            $path = "../src/loaded_photo";
            if(!is_dir($path)):
                mkdir($path);
            endif;

            $lastFile = Client::getLastPhoto($cid);
            if(file_exists("../src/loaded_photo/".$lastFile)):
                unlink($path."/".$lastFile);
            endif;
            
            if( move_uploaded_file($pht['tmp_name'],$path."/".$toSaveName)):

                $cmd = "UPDATE client SET thumbnail  = ?  WHERE client_id = ?" ;
                $cmd =  Conn::conect()  -> prepare($cmd);
                $done = $cmd -> execute(
                    array($toSaveName,$cid)
                );
                return $done?true:"";
            else:
                    unlink($path."/".$toSaveName);
                    return false;
            endif;
        }

        public static function deletePhoto($id){
            $lastPhoto = Client::getLastPhoto($id);
            $cmd = "UPDATE client SET thumbnail = '' WHERE client_id = ?";
            $cmd =  Conn::conect()  -> prepare($cmd);
            $done = $cmd -> execute(array($id));
            if($done):
                unlink("../src/loaded_photo/".$lastPhoto);
            endif;
           
            return $done?true:false;

        }
        
      

    }


