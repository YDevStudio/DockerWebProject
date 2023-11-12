
<?php
  require_once("Connection.php");

  
  class StatisticsRun extends Connection{

      private $pdoA; 


     public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }
     
      
    public function getAllProductsX(){
           $sql = $this->pdoA->query("select idp,pname,xhover,xvisit from prodect");
           $sql->execute();
           return $sql->fetchAll();
     }
      
    public function getAllFilesStat(){
           $sql = $this->pdoA->query("select file,x from visitor");
           $sql->execute();
           return $sql->fetchAll();
     }
      
    public function incXhover($id){
     	 $sql = $this->pdoA->prepare("update prodect  set xhover=xhover+1 where idp = :id");
     	 $sql->bindValue(":id" , $id);
     	 $sql->execute();
     }  
    public function incXvist($id){
     	 $sql = $this->pdoA->prepare("update prodect  set xvisit=xvisit+1 where idp = :id");
     	 $sql->bindValue(":id" , $id);
     	 $sql->execute();
     }
      public function pinList($id){
           $sql = $this->pdoA->prepare("SELECT count(idu) from mylist where idp = :id  ");
           $sql->bindValue(":id" , $id);
           $sql->execute();

              return $sql->fetch()[0];

     }
      public function getSumVX(){
           $sql = $this->pdoA->query("select SUM(x) from visitor");
           $sql->execute();
           return $sql->fetch()[0];
     }
      
    public function incX($id){
     	 $sql = $this->pdoA->prepare("update  visitor set x=x+1 where id = :id");
     	 $sql->bindValue(":id" , $id);
     	 $sql->execute();
     }
      
      public function pinD0($id){
           $sql = $this->pdoA->prepare("SELECT count(idu) from demand where idp = :id and state =0 ");
           $sql->bindValue(":id" , $id);
           $sql->execute();

              return $sql->fetch()[0];

     }
      
      public function pinD1($id){
           $sql = $this->pdoA->prepare("SELECT count(idu) from demand where idp = :id and state  BETWEEN 1 and 3 ");
           $sql->bindValue(":id" , $id);
           $sql->execute();

              return $sql->fetch()[0];
     }
                

      }
?>