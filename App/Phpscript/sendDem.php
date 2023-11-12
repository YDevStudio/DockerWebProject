<?php 

require_once("../classes/connectionClass/DemandRun.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
    $Dr= new DemandRun();
	$Dr->sendDemand($id);
    header("location:../../public/Pages/commande.php");
	}else{
	echo 'min da taged';
}
?>