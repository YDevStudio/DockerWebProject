<?php
	
	session_start();


    require_once("../../classes/assistClass/assist.class.php");

 if(isset($_POST['btnS'],$_POST['userA'] , $_POST['passA'])){
        
              $user = $_POST['userA'];
              $pass = $_POST['passA'];
              $c= assist::coderHasch($user,$pass);
              if($c===assist::getCode()){
                     
              	    $_SESSION['steSA'] =  $c;
				    header("location:../admin/home.php");
              }
     else{
           header("location:../?err");
     }
        }
		        
     else echo 'error';
            
	
?>