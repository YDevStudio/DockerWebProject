<?php 

require_once("../classes/connectionClass/DemandRun.php");
if(isset($_POST['idu'],$_POST['idp'])){
	$idu=$_POST['idu'];
    $idp=$_POST['idp'];
    $dr= new DemandRun();
	$dr->deleteitem($idu,$idp);    
	}else{
	echo 'min da taged';
}
?>