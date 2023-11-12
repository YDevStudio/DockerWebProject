<?php 

require_once("../classes/connectionClass/DemandRun.php");
if(isset($_POST['idu'],$_POST['idp'],$_POST['np'])){
	$idu=$_POST['idu'];
    $idp=$_POST['idp'];
    $np=$_POST['np'];
    $Dr= new DemandRun();
	$Dr->addItem($idu,$idp,$np);
  
	}else{
	echo 'min da taged';
}
?>