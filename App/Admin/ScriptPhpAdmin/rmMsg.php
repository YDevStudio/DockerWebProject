<?php 

require_once("../../classes/connectionClass/FeedBackRun.php");
if(isset($_GET['idf'])){
	$idf=$_GET['idf'];
    $fbr= new FeedBackRun();
	$fbr->deleteFB($idf);
	}else{
	echo 'min da taged';
}
?>