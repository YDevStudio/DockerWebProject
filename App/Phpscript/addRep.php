<?php 

require_once("../classes/connectionClass/CommentRun.php");
if(isset($_POST['relp'],$_GET['idp'],$_GET['idu'],$_GET['idc'])){
    if(trim($_POST['relp'])!=''){
    $cr = new CommentRun();
    $cr->reply($_GET['idc'],$_POST['relp'],$_GET['idu']);}
    header("location:../../public/Pages/product.php?idp=".$_GET['idp']);
	}else{
	die('min da taged');
}
?>