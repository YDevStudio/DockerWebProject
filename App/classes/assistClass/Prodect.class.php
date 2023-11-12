<?php

class Prodect {
	  private $idP;
      private $name;
      private $type;
      private $Length;
      private $Heigth;
      private $Width; 
      private $category;
      private $price;	
      private $inStock;
      private $descp;
       public function __construct(array $data=null)
	   {
          if($data != null){   
          if(count($data) == 9){
           $this->name = $data[0];
	       $this->type = $data[1];
           $this->Length= $data[2];
           $this->Heigth= $data[3];
           $this->Width= $data[4]; 
           $this->category= $data[5];
           $this->price= $data[6];
           $this->inStock= $data[7];
           $this->descp= $data[8];}
		  }
	   }
      public function getIdP(){
          return $this->idP;
      }
      
       public function getName(){
             return $this->name;
       }

         public function getType(){
             return $this->type;
       }

         public function getLength(){
             return $this->Length;
       }

         public function getHeigth(){
             return $this->Heigth;
       }

         public function getCategory(){
             return $this->category;
       }

         public function getWidth(){
             return $this->Width;
       }
	
         public function getPrice(){
             return $this->price;
       }

       public function setIdP($idP){
           $this->idP=$idP;
       }
          public function getDescp(){
             return $this->descp;
       }
      public function isInStock(){
             return $this->inStock;
       }
    
      public function setDescp($descp){
          $this->descp= $descp;
      }
        
      public function bInStock($boll){
          $this->inStock= $boll;
       }
    
      public function setname($name){
      	 if(!empty($name)){
      	 	 $this->name = $name;
		 }
           
      }

      public function setType($type){
      
         if(!empty($type)){
      	 	 $this->type = $type;
      	 }
      }

      public function setLength($Length){
           
         if(!empty($Length)){
      	 	$this->Length = $Length;
		 }
      }
      public function setHeigth($Heigth){
              $this->Heigth = $Heigth;   
      }
	
      public function setCategory($C){
          if(!empty($C)){
      	 	   $this->category = $C;
		  }
      }

      public function setWidth($Width){

      	 if(!empty($Width)){
      	 	   $this->Width = $Width;
      	 } 
      }

      public function setPrice($price){
           
          if(!empty($price)){
      	 	  $this->price = $price;
		  }
      }
   }

?>