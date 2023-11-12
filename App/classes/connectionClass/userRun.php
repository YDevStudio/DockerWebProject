
<?php

  require_once("Connection.php");
  require_once( __DIR__."/../assistClass/User.class.php");
  
  class UserRun extends Connection
  {
   
   
      private $pdoA;

  
    public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }
	  
	 
    public function addUser(User $u){
             
			$sql = $this->pdoA->prepare("insert into user (fname,lname,bd,gender,pn,email,address,city,password,datei) values (:c1 , :c2 , :c3 , :c4, :c5 , :c6 , :c7, :c8 , :c9 ,now())");
             $password = $u->getPS();
             $crypte = hash('sha256', $password);
             $sql->bindValue(":c1" , $u->getFN());
             $sql->bindValue(":c2" , $u->getLN());
             $sql->bindValue(":c3" , $u->getBD());
             $sql->bindValue(":c4" , $u->getGender());
             $sql->bindValue(":c5" , $u->getPN());
			 $sql->bindValue(":c6" , $u->getEmail());
             $sql->bindValue(":c7" , $u->getA());
             $sql->bindValue(":c8" , $u->getCity());
             $sql->bindValue(":c9" , $crypte);
             if($sql->execute())
                 return true;
                 return false;
   }  
	   ###login
       public function conectUser($email,$password){
           $crypte = hash('sha256', $password);
           $sql = $this->pdoA->prepare("select id from user where email = :c1 and password = :c2");
           $sql->bindValue(":c1" , $email);
           $sql->bindValue(":c2" , $crypte);
           $sql->execute();

           if($sql->rowCount() == 1){
                 return $sql->fetch();
           }else{
                 return false ;
           }
            
       }
	   
       public function editUser(User $u,$id){
             $sql = $this->pdoA->prepare("update user set fname = :c1 , lname = :c2 , bd = :c3 , gender =:c4 , pn = :c5 , address = :c6 , city = :c7 where id = :c0"); 
             $sql->bindValue(":c0" , $id);
             $sql->bindValue(":c1" , $u->getFN());
             $sql->bindValue(":c2" , $u->getLN());
             $sql->bindValue(":c3" , $u->getBD());
             $sql->bindValue(":c4" , $u->getgender());
             $sql->bindValue(":c5" , $u->getPn());
             $sql->bindValue(":c6" , $u->getA());
             $sql->bindValue(":c7" , $u->getCity());
             $sql->execute();
       }

     public function deleteUser($id){
          $sql = $this->pdoA->prepare("delete from user where id = :C");
          $sql->bindValue(":C" , $id);
          $sql->execute();
     }

	 

     public function getUserbyEmail($email){
           $sql = $this->pdoA->prepare("select * from user where email = :email");
           $sql->bindValue(":email" , $email);
           $sql->execute();
           return $sql->fetch();
     }


     public function getUserById($id){
           $sql = $this->pdoA->prepare("select * from user where id = :id ");
           $sql->bindValue(":id" , $id);
           $sql->execute();
           return $sql->fetch();
     }
	  

	 public function getUsersByCity($city){
           $sql = $this->pdoA->prepare("select * from user where city = :f ");
           $sql->bindValue(":f" , $city);
           $sql->execute();
           return $sql->fetchAll();
     }
      
      

	 public function getAllUsers(){
           $sql = $this->pdoA->query("select * from user ");
           $sql->execute();
           return $sql->fetchAll();
     }
	  
	  

 }
?>