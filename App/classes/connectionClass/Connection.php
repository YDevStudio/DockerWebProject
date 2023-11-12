<?php
###class Connection 
class Connection
{
        ###function pour return l'objet pdo et cree la connection
        public static function getMysqlCon(){
     
            try{
            $pdo = new PDO("mysql:host=db;dbname=ste_data" , "user" , "password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            return $pdo;
            }
            catch (PDOException $e){
                echo " ".$e->getMessage();
            }
         }
}
?>