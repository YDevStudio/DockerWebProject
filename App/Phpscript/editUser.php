<?php 

require_once("../classes/connectionClass/userRun.php");
if(isset($_POST['id'])){
	$u =new User([$_POST['ln'],$_POST['fn'],$_POST['bd'],$_POST['gn'],$_POST['tel'],'','',$_POST['ad'],$_POST['ci']]);
    $ur =new UserRun();
    $ur->editUser($u,$_POST['id']);
	}else{
	die('min da taged');
}
?>