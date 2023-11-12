<?php 

require_once("../../classes/connectionClass/ProdectRun.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
    $pr= new ProdectRun();
	$pr->switchInStock($id);
	}else{
	echo 'min da taged';
}
?>