<?php 

require_once("../classes/connectionClass/MyListRun.php");
if(isset($_POST['idu'],$_POST['idp'])){
	$idu=$_POST['idu'];
    $idp=$_POST['idp'];
    $mr= new MyListRun();
	$mr->deleteitem($idu,$idp);
	}else{
	echo 'min da taged';
}
?>