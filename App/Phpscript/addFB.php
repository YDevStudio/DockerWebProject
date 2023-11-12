<?php 

require_once("../classes/connectionClass/FeedBackRun.php");
if(isset($_POST['btnS'])){

	$data =[$_POST['n1'],$_POST['n2'],$_POST['n3'],$_POST['n4'],$_POST['n5']];
    $fbr =new FeedBackRun();
    $fbr->adFeedBack($data);
    header("location:../../public/Pages/contact.php?send=ZANSzuFZKKO0kkokt88rh8ze5gaheif");
	}else{
	die('min da taged');
}
?>