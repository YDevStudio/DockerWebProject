<?php 

require_once("../classes/connectionClass/ProdectRun.php");
if(isset($_POST['idp'])){
	$id=$_POST['idp'];
    $pr= new ProdectRun();
	$pr->incXhover($id);
    
	}else{
	echo 'min da taged';
}
?>