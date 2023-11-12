<?php
  require_once("Connection.php");

  
  class DemandRun extends Connection{

      private $pdoA; 
      
       public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }

     public function addItem( $idu, $idp , $np){
                $sql= $this->pdoA->prepare("select sum(np) from demand where idu= :idu and idp = :idp and state=0");
                $sql->bindValue(":idu" , $idu);
                $sql->bindValue(":idp" , $idp);
                $sql->execute();
                $np2=$sql->fetch()[0];
                if($np2 !=  0 ){
                $sql = $this->pdoA->prepare("update demand set  np = :c3 where idu= :c1 and idp = :c2 and state=0");
                $sql->bindValue(":c1" , $idu);
                $sql->bindValue(":c2" , $idp);
                $sql->bindValue(":c3" , $np + $np2);
                return $sql->execute();
                    
                }else{
                $sql = $this->pdoA->prepare("insert into demand (idu, idp , np ) values (:c1 , :c2 , :c3)");
                $sql->bindValue(":c1" , $idu);
                $sql->bindValue(":c2" , $idp);
                $sql->bindValue(":c3" , $np);
                return $sql->execute();
                }
	  }

     public function getCurrentDemand($idu){
           $sql = $this->pdoA->prepare("SELECT demand.idp,prodect.pname,prodect.imgs,prodect.price,demand.np FROM demand INNER JOIN prodect ON demand.idp=prodect.idp where demand.idu= :idu and state=0");
           $sql->bindValue(":idu" , $idu);
           $sql->execute();

              return $sql->fetchAll();

     }
      
     public function getSentDemand(){
      $sql = $this->pdoA->prepare("SELECT 
          demand.idd, 
          MAX(demand.idu) AS idu, 
          COUNT(demand.idd) AS count, 
          MAX(demand.ddate) AS ddate, 
          MAX(user.lname) AS lname, 
          MAX(user.fname) AS fname, 
          MAX(user.pn) AS pn, 
          MAX(user.email) AS email 
      FROM `demand` 
      INNER JOIN user ON demand.idu = user.id 
      WHERE state=1 
      GROUP BY demand.idd");
      $sql->execute();
      return $sql->fetchAll();
  }
  
  public function getSentDemandByUser($idu){
   $sql = $this->pdoA->prepare("SELECT demand.idd, COUNT(demand.idd), demand.ddate FROM demand WHERE state=1 AND idu= :idu GROUP BY demand.idd, demand.ddate");
   $sql->bindValue(":idu", $idu);
   $sql->execute();
   return $sql->fetchAll();
}

      
     public function getSentDemandByIdd($idd){
           $sql = $this->pdoA->prepare("SELECT demand.idd,prodect.idp,prodect.pname,prodect.pcat,demand.np,prodect.price FROM demand INNER JOIN prodect ON demand.idp=prodect.idp where demand.idd= :idd and state=1");
           $sql->bindValue(":idd" , $idd);
           $sql->execute();

              return $sql->fetchAll();

     }
     public function getValidDemand(){
      $sql = $this->pdoA->prepare("SELECT demand.idd, MAX(demand.idu) AS idu, COUNT(demand.idd), MAX(demand.ddate) AS ddate, MAX(user.lname) AS lname, MAX(user.fname) AS fname, MAX(user.pn) AS pn, MAX(user.email) AS email FROM `demand` INNER JOIN user ON demand.idu = user.id WHERE state=2 GROUP BY demand.idd");
      $sql->execute();
      return $sql->fetchAll();
  }
  public function getValidDemandByUser($idu){
   $sql = $this->pdoA->prepare("SELECT demand.idd, COUNT(demand.idd), demand.ddate FROM demand WHERE state=2 AND idu= :idu GROUP BY demand.idd, demand.ddate");
   $sql->bindValue(":idu", $idu);
   $sql->execute();
   return $sql->fetchAll();
}

      
     public function getValidDemandByIdd($idd){
           $sql = $this->pdoA->prepare("SELECT demand.idd,prodect.idp,prodect.pname,prodect.pcat,demand.np,prodect.price FROM demand INNER JOIN prodect ON demand.idp=prodect.idp where demand.idd= :idd and state=2");
           $sql->bindValue(":idd" , $idd);
           $sql->execute();

              return $sql->fetchAll();

     }
     public function getReadyDemand(){
      $sql = $this->pdoA->prepare("SELECT demand.idd, MAX(demand.idu) AS idu, COUNT(demand.idd), MAX(demand.ddate) AS ddate, MAX(user.lname) AS lname, MAX(user.fname) AS fname, MAX(user.pn) AS pn, MAX(user.email) AS email FROM `demand` INNER JOIN user ON demand.idu = user.id WHERE state=3 GROUP BY demand.idd");
      $sql->execute();
      return $sql->fetchAll();
  }
  public function getReadyDemandByUser($idu){
   $sql = $this->pdoA->prepare("SELECT demand.idd, COUNT(demand.idd), demand.ddate FROM demand WHERE state=3 AND idu= :idu GROUP BY demand.idd, demand.ddate");
   $sql->bindValue(":idu", $idu);
   $sql->execute();
   return $sql->fetchAll();
}

      
     public function getReadyDemandByIdd($idd){
           $sql = $this->pdoA->prepare("SELECT demand.idd,prodect.idp,prodect.pname,prodect.pcat,demand.np,prodect.price FROM demand INNER JOIN prodect ON demand.idp=prodect.idp where demand.idd= :idd and state=3");
           $sql->bindValue(":idd" , $idd);
           $sql->execute();

              return $sql->fetchAll();

     }
      
      
     public function getNCD(){
           $sql = $this->pdoA->query("SELECT count(DISTINCT idd) from demand where state=3");
           $sql->execute();

              return $sql->fetch()[0];

     }
    public function getNVD(){
           $sql = $this->pdoA->query("SELECT count(DISTINCT idd) from demand where state=2");
           $sql->execute();

              return $sql->fetch()[0];

     }
    public function getNSD(){
           $sql = $this->pdoA->query("SELECT count(DISTINCT idd) from demand where state=1");
           $sql->execute();

              return $sql->fetch()[0];

     }
     public function deleteitem( $idu,  $idp){
          $sql = $this->pdoA->prepare("delete from demand where idp = :idp and idu = :idu and state = 0");
          $sql->bindValue(":idp" , $idp);
          $sql->bindValue(":idu" , $idu);
          $sql->execute();
     }
      
     public function deleteDemand($idd){
          $sql = $this->pdoA->prepare("delete from demand where idd = :idd");
          $sql->bindValue(":idd" , $idd);
          $sql->execute();
     }
     
     public function validDemand($idd){
          $sql = $this->pdoA->prepare("update  demand set state=2 , vdate=now() where idd = :idd");
          $sql->bindValue(":idd" , $idd);
          $sql->execute();
     }
     public function completeDemand($idd){
          $sql = $this->pdoA->prepare("update  demand set state=3 ,fdate=now() where idd = :idd");
          $sql->bindValue(":idd" , $idd);
          $sql->execute();
     }
     public function sendDemand($idu){
          $sql= $this->pdoA->query("select MAX(COALESCE(idd,0))+1 from demand");
          $sql->execute();
          $n=$sql->fetch()[0];
          $sql = $this->pdoA->prepare("update  demand set state=1, idd = :n ,ddate= now()   where idu = :idu    and state=0 ");
          $sql->bindValue(":idu" , $idu);
           $sql->bindValue(":n" , $n);
          $sql->execute();
     }
     public function getBillByDemand($idd){
         
          $sql = $this->pdoA->prepare("SELECT SUM(demand.np * prodect.price) from demand INNER JOIN prodect ON demand.idp = prodect.idp WHERE demand.idd= :idd ");
          $sql->bindValue(":idd" , $idd);
          $sql->execute();
         return $sql->fetch();
     }

     

                

      }
?>