<?php
  require_once("Connection.php");

  class FeedBackRun extends Connection{

      private $pdoA; 


    public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }


      public function adFeedBack($data){

                $sql = $this->pdoA->prepare("insert into feedback (fname  ,lname, email, num , txt) values (:c1 , :c2 , :c3,:c4,:c5)");

                $sql->bindValue(":c1" ,$data[0]);
                $sql->bindValue(":c2" ,$data[1]);
                $sql->bindValue(":c3" ,$data[2]);
                $sql->bindValue(":c4" ,$data[3]);
                $sql->bindValue(":c5" ,$data[4]);

                return $sql->execute();
 }

     public function getAllFeddBacks(){
           $sql = $this->pdoA->query("SELECT * from feedback");
           $sql->execute();

              return $sql->fetchAll();

     }
     public function getNFB(){
           $sql = $this->pdoA->query("SELECT count(*) from feedback");
           $sql->execute();

              return $sql->fetch()[0];

     }
     public function deleteFB($idf){
          $sql = $this->pdoA->prepare("delete from feedback where idf = :idf");
          $sql->bindValue(":idf" , $idf);
          $sql->execute();
          
     }

     


      }
?>