<?php 

require_once("../classes/connectionClass/CommentRun.php");
if(isset($_POST['btnS'],$_POST['com'],$_GET['idp'],$_GET['idu'])){
    if(trim($_POST['com'])!=''){
    $c= new Comment([$_POST['com'],$_GET['idu'],$_GET['idp']]);
    $cr = new CommentRun();
    $cr->addCom($c);}
    header("location:../../public/Pages/product.php?idp=".$_GET['idp']);
	}else{
	die('min da taged');
}
?>