<?php
  require_once("Connection.php");
  require_once( __DIR__."/../assistClass/Comment.class.php");
  
  class CommentRun extends Connection{

      private $pdoA; 


    public function __construct(){
        $this->pdoA = Connection::getMysqlCon();
    }


      public function addCom(Comment $comment){

                $sql = $this->pdoA->prepare("insert into comment (comtext  , idu, idp , comdate) values (:c1 , :c2 , :c3,now())");

                $sql->bindValue(":c1" , $comment->getComText());
                $sql->bindValue(":c2" , $comment->getIdU());
                $sql->bindValue(":c3" , $comment->getIdP());

                return $sql->execute();
 }

     public function getComByProdect($idp){
           $sql = $this->pdoA->prepare("SELECT comment.idc,comment.comtext,comment.comdate,comment.modified,comment.idu,user.lname,user.fname FROM comment INNER JOIN user ON comment.idu=user.id where comment.idp= :idp");
           $sql->bindValue(":idp" , $idp);
           $sql->execute();

              return $sql->fetchAll();

     }

     public function deleteComment($idC){
          $sql = $this->pdoA->prepare("delete from comment where idc = :idc");
          $sql->bindValue(":idc" , $idC);
          $sql->execute();
          $sql = $this->pdoA->prepare("delete from reply where idc = :idc");
          $sql->bindValue(":idc" , $idC);
          $sql->execute();
     }

     public function editCom($id,$com){
       $sql = $this->pdoA->prepare("update comment set modified = true , comtext = :c1  where idc =:id");
       $sql->bindValue(":c1" ,$com); 
       $sql->bindValue(":id",$id);         
       return $sql->execute(); 
     }
      
     public function reply($idC,$replyText,$idU){
        $sql = $this->pdoA->prepare("insert into reply (idc  , replytext, idu ,replydate) values (:c1 , :c2 , :c3 , now())");

                $sql->bindValue(":c1" , $idC);
                $sql->bindValue(":c2" , $replyText);
                $sql->bindValue(":c3" , $idU);

                return $sql->execute();     
     }
    public function getAllReplysByComent($idC){
           $sql = $this->pdoA->prepare("SELECT reply.idc , reply.replytext, reply.replydate, reply.idu, user.lname,user.fname FROM reply INNER JOIN user ON reply.idu=user.id where reply.idc = :x ");
           $sql->bindValue(":x" , $idC);
           $sql->execute();

            return $sql->fetchAll();

     }

    


      }
?>