 <?php
  require_once("Connection.php");

  
  class MyListRun extends Connection{

      private $pdoA; 
      
       public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }

     public function addItem( $idu, $idp){
            
            $sql = $this->pdoA->prepare("insert into mylist (idu, idp ) values (:c1 , :c2 )");

                $sql->bindValue(":c1" , $idu);
                $sql->bindValue(":c2" , $idp);
                return $sql->execute();
	  }


     
     public function getItemsByIdu($idu){
           $sql = $this->pdoA->prepare("SELECT mylist.idp,prodect.pname,prodect.imgs,prodect.price FROM mylist INNER JOIN prodect ON mylist.idp=prodect.idp where mylist.idu= :idu");
           $sql->bindValue(":idu" , $idu);
           $sql->execute();

              return $sql->fetchAll();

     }
     public function NItemsByUser($idu){
           $sql = $this->pdoA->prepare("SELECT count(*) from mylist  where idu= :idu");
           $sql->bindValue(":idu" , $idu);
           $sql->execute();

              return $sql->fetch();

     }
     public function PinList(){
           $sql = $this->pdoA->query("SELECT idp,count(idu) from mylist  GROUP BY idp ORDER BY COUNT(idu) DESC");
           $sql->execute();

              return $sql->fetchAll();

     }

     public function deleteitem( $idu,  $idp){
          $sql = $this->pdoA->prepare("delete from mylist where idp = :idp and idu = :idu");
          $sql->bindValue(":idp" , $idp);
          $sql->bindValue(":idu" , $idu);
          $sql->execute();
     }

      public function isInList( $idu,  $idp){
          $sql = $this->pdoA->prepare("select * from mylist where idp = :idp and idu = :idu");
          $sql->bindValue(":idp" , $idp);
          $sql->bindValue(":idu" , $idu);
          $sql->execute();
          if($sql->rowCount() == 1){
                     return true;
               }else{
                    return false;  
               }
     }

                

      }
?>