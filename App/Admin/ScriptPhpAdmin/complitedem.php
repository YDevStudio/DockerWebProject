<?php 

require_once("../../classes/connectionClass/demandRun.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
    $dr= new DemandRun();
	$dr->completeDemand($id);
	}else{
	echo 'min da taged';
}
?>