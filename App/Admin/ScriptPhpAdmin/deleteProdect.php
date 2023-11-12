<?php 

require_once("../../classes/connectionClass/ProdectRun.php");
if(isset($_POST['valid'])){
	$cod=$_POST['cod'];
	$pr= new ProdectRun();
    $files = $pr->getImagesById($cod);
foreach ($files as $file) {
    $file='../../../public/pimg/'.$file;
    if (file_exists($file)) {
        unlink($file);
    } else {
       
    }
}
	$pr->deleteP($cod);
	header("location:../admin/product.php");

}
if(isset($_POST['no'])){
		header("location:../admin/product.php");
}
if(isset($_GET['cod'])){
	$id=$_GET['cod'];
	}else{
	echo 'min da taged';
}
?>
<html>
	<head>
		<meta charset="utf-8">
        <title>Admin</title>
		<style>
			.main{
				background-color: white;
				box-shadow: 0 6px 14px 0 rgba(0, 22, 50, 0.3);
				width: 45%;
				margin: 4% auto;
				font-family: "Comic Sans MS", cursive, sans-serif;
				text-align: center;
			}
			.btn1{
				background-color: #00e600;
				padding: 6px 2px;
				border-radius: 4px;
				color: black;
                cursor:pointer;
				text-decoration: none;
				border: 1px solid black;
				margin: auto;
			}
					
			.btn2{
				background-color: #ff1a1a;
				padding: 6px 2px;
				border-radius: 4px;
                cursor:pointer;
				color: black;
				text-decoration: none;
				border: 1px solid black;
				margin: auto;
                
			}


		</style>
	</head>
	<body>
		<div class="main">
			<p>êtes-vous sûr de vouloir supprimer ce produit <span style="color:red; font-size: 1.2em"> <?php echo 'Px'.(intval($id)*3+173); ?></span></p>
			<form action="" method="post">
				<input type=submit name="valid" value="confirmer" class="btn1">
				<input type=submit name="no" value="Annuler" class="btn2" >
				<input type="hidden" name="cod" value="<?php echo $id?>">
			</form>
		</div>
	</body>
</html>