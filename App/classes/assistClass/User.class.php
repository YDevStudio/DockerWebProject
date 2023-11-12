<?php

class User {
	  private $id;
      private $LName;
      private $FName;
      private $BD;
      private $gender;
      private $PN; 
      private $email;
      private $password;	
      private $address;
      private $city;
       public function __construct(array $data=null)
	   {
          if($data != null){   
          if(count($data) == 9){
           $this->LName = $data[0];
	       $this->FName = $data[1];
           $this->BD= $data[2];
           $this->gender= $data[3];
           $this->PN= $data[4]; 
           $this->email= $data[5];
           $this->password= $data[6];
           $this->address= $data[7];
           $this->city= $data[8];}
		  }
	   }
      public function getId(){
          return $this->id;
      }
      
       public function getLN(){
             return $this->LName;
       }

         public function getFN(){
             return $this->FName;
       }

         public function getBD(){
             return $this->BD;
       }

         public function getGender(){
             return $this->gender;
       }

         public function getEmail(){
             return $this->email;
       }

         public function getPN(){
             return $this->PN;
       }
	
         public function getPS(){
             return $this->password;
       }

       public function setId($id){
           $this->id=$id;
       }
          public function getA(){
             return $this->address;
       }
      public function getCity(){
             return $this->city;
       }
    
      public function setA($A){
          $this->address= $A;
      }
        
      public function setCity($city){
          $this->city= $city;
       }
    
      public function setLN($LName){
      	 if(!empty($LName)){
      	 	 $this->LName = $LName;
		 }
           
      }

      public function setFN($FName){
      
         if(!empty($FName)){
      	 	 $this->FName = $FName;
      	 }
      }

      public function setBD($BD){
           
         if(!empty($BD)){
      	 	$this->BD = $BD;
		 }
      }
      public function setGender($gender){
              $this->gender = $gender;   
      }
	
      public function setEmail($email){
          if(!empty($email)){
      	 	   $this->email = $email;
		  }
      }

      public function setPN($PN){

      	 if(!empty($PN)){
      	 	   $this->PN = $PN;
      	 } 
      }

      public function setPS($PS){
           
          if(!empty($password)){
      	 	  $this->password = $password;
		  }
      }
   }

?>