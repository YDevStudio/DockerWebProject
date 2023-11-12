<?php
  require_once("Connection.php");
  require_once( __DIR__."/../assistClass/Prodect.class.php");
  
  class ProdectRun extends Connection{

      private $pdoA; 


     public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }
     public function addProdect(Prodect $p,array $img){
            
            	$sql = $this->pdoA->prepare("insert into prodect (pname , ptype , pl , pw , ph , pcat , price , in_stock, descp ,imgs,img2,img3) values (:c1 , :c2 , :c3 , :c4 , :c5 , :c6, :cc1 , :cc2 , :cc3 , :cc4 , :cc5 , :cc6 )");

            	$sql->bindValue(":c1" , $p->getName());
            	$sql->bindValue(":c2" , $p->getType() );
            	$sql->bindValue(":c3" , $p->getLength());
            	$sql->bindValue(":c4" , $p->getWidth());
            	$sql->bindValue(":c5" , $p->getHeigth());
            	$sql->bindValue(":c6" , $p->getCategory());
                $sql->bindValue(":cc1" , $p->getPrice());
            	$sql->bindValue(":cc2" , $p->isInStock() );
            	$sql->bindValue(":cc3" , $p->getDescp());
            	$sql->bindValue(":cc4" , $img[0]);
            	$sql->bindValue(":cc5" , $img[1]);
            	$sql->bindValue(":cc6" , $img[2]);
            	$sql->execute();
	  }


     public function editProdect(Prodect $p , $id){
     	 $sql = $this->pdoA->prepare("update prodect set pname = :c1 , ptype= :c2 , pl = :c3 , pw = :c4 , ph = :c5 ,pcat = :c6 , price = :c7 , in_stock = :c8, descp = :c9 where idp = :idp");
                
     	       $sql->bindValue(":c1" , $p->getName());
            	$sql->bindValue(":c2" , $p->getType() );
            	$sql->bindValue(":c3" , $p->getLength());
            	$sql->bindValue(":c4" , $p->getWidth());
            	$sql->bindValue(":c5" , $p->getHeigth());
            	$sql->bindValue(":c6" , $p->getCategory());
                $sql->bindValue(":c7" , $p->getPrice());
            	$sql->bindValue(":c8" , $p->isInStock() );
            	$sql->bindValue(":c9" , $p->getDescp());
                $sql->bindValue(":idp" , $id);
                $sql->execute();
     }

     
     public function getProdectByIdp($id){
          $sql = $this->pdoA->prepare("select * from prodect where idp = :id");
          $sql->bindValue(":id" , $id);
          $sql->execute();
          return $sql->fetch();
     }
    public function getInStockProdect(){
          $sql = $this->pdoA->query("select * from prodect where  in_stock = 1 ");
          $sql->execute();
          return $sql->fetchAll();
     }
      
    public function getNotInStockProdect(){
          $sql = $this->pdoA->query("select * from prodect where  in_stock = 0 ");
          $sql->execute();
          return $sql->fetchAll();
     }
      
      

     public function getProdectBySearch($search){
            $sql = $this->pdoA->prepare("select * from prodect where (pname like :c1 )");
            $sql->bindValue(":c1" , '%' . $search . '%');
            $sql->execute();
            return $sql->fetchAll();
            

     }

    public function getprodectsByCat($cat){
            $sql = $this->pdoA->prepare("select * from prodect where pcat = :cat");
            $sql->bindValue(":cat" , $cat);
            $sql->execute();
            return $sql->fetchAll();
     }
       
     public function  sortProductByX($X){
            $query="select * from prodect order by ".$X." desc";
            $sql = $this->pdoA->query($query);
            $sql->execute();
            return $sql->fetchAll();
     }
       

     public function switchInStock($idp){
          $sql0 = $this->pdoA->prepare("select in_stock from prodect where idp = :id");
          $sql0->bindValue(":id" , $idp);
          $sql0->execute();
          $bool = !$sql0->fetch()[0]; 
          $sql = $this->pdoA->prepare("update prodect set in_stock = :b where idp = :id ");
          $sql->bindValue(":id" , $idp);
          $sql->bindValue(":b" , $bool);
          $sql->execute();
     }

      
           public function getAlllProdects(){
           $sql = $this->pdoA->query("select * from prodect ");
           $sql->execute();
           return $sql->fetchAll();
     }

     public function getImagesById($id){
            $sql = $this->pdoA->prepare("select imgs,img2,img3 from prodect where idp= :id");
            $sql->bindValue(":id" , $id);
            $sql->execute();
            return $sql->fetch();
     }
     public function deleteP($id){
     	 $sql = $this->pdoA->prepare("delete from prodect where idp = :id");
     	 $sql->bindValue(":id" , $id);
     	 $sql->execute();
     }
      
    public function getAllProductsX(){
           $sql = $this->pdoA->query("select idp,pname,xhover,xvisit from prodect");
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
      public function deleteFromHome($idp){
     	 $sql = $this->pdoA->prepare("update prodect set in_home=0 where idp = :id");
     	 $sql->bindValue(":id" , $idp);
     	 $sql->execute();
     }
      public function setInHome($idp){
     	 $sql = $this->pdoA->prepare("update prodect set in_home=1 where idp = :id");
     	 $sql->bindValue(":id" , $idp);
     	 $sql->execute();
     }
     
      public function getAllHomeP(){
           $sql = $this->pdoA->query("select idp,imgs,pcat,pname,price from prodect where in_home=1");
           $sql->execute();
           return $sql->fetchAll();
     }
                

      }
?>