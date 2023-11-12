<?php


class Comment {
    
    private $idC;
    private $comText;
    private $comDate;
    private $modified;
    private $idP;
    private $idU;
    
    public function __construct(array $tdata=null)
    {
        $this->comText=$tdata[0];
        $this->idU=$tdata[1];
        $this->idP=$tdata[2];
     }

    public function getIdC(){
    	return $this->IdC();
    }
    
    public function getComDate(){
    	return $this->comDate;
    }
    
    public function getComText(){
    	return $this->comText;
    }


    public function getIdP(){
    	return $this->idP;
    }


     public function getIdU(){
     	return $this->idU;
     }


    public function setIdC($idC){
        if(!empty($idC)){
            $this->idC = $idC;
        }
     }
        public function setComDate($comDate){
        if(!empty($comDate)){
            $this->comDate = $comDate;
        }
     }

       public function setIdP($idP){
        if(!empty($idP)){
            $this->idP = $idP;
        }
     }


       public function setIdU($idU){
        if(!empty($idU)){
            $this->idU = $idU;
        }
     }


  
     public function setComText($comText){
     	if(!empty($comText)){
     		$this->comText = $comText;
     	}
     }
    
     public function isModified(){
     	return $this->modified;
     }


    public function modifie($bool){
        
            $this->modified = $bool;
        
     }
}

?>