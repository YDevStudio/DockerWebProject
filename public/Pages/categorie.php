<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    	session_start();
    require_once("../../App/classes/connectionClass/StatisticsRun.php");
    $pro=new StatisticsRun();
    $pro->incX(2);
    require_once("../../App/classes/connectionClass/userRun.php");
    require_once("../../App/classes/assistClass/assist.class.php");
    $conect =false;
    if(isset($_SESSION['steS'])){
        $co=$_SESSION['steS'];
        $data=assist::incoder($co);
        $ur=new UserRun();
        $name=$ur->getUserbyEmail($data[1])[1];
        $conect =true;
    }else{
        if(isset($_COOKIE['steC'])){
        $co=$_COOKIE['steC'];
        $data=assist::incoder($co);
        $ur=new UserRun();
        $name=$ur->getUserbyEmail($data[1])[1];
        $conect =true;
    }        
    }
        if(isset($_GET['cat'])){
            require_once("../../App/classes/connectionClass/ProdectRun.php");
            $pr= new ProdectRun();
            $p=$pr->getprodectsByCat($_GET['cat']);
            $p2= $pr->getAllHomeP();
        }else{
            if(isset($_POST['search']) and trim($_POST['search']) !=''){
                require_once("../../App/classes/connectionClass/ProdectRun.php");
                $pr= new ProdectRun();
                $p=$pr->getProdectBySearch($_POST['search']);
                $p2= $pr->getAllHomeP();
            }else{
                header("location:../../");
            }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Site</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    	<script src="../js/owl.carousel.min.js"></script>
        

    </head>
    
    <body>
        
<!--
        <div class="navfixed" style="position: fixed; width: 100%;">
        <header class="col-lg-12" >
        <nav class=" navbar navbar-expand-lg navbar-light bg-company-green col-lg-12" style="color: #fff;">
                    
                        
            <div class="col-lg-12">                
                <nav class="navbar navbar-expand-lg navbar-light bg-company-green" >
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form  style="width: 55%; "action="#" method="#" style="width: 10%;">
                            <input type="text" class="form-control" name="search" placeholder="Tapez ici un produit ou une catégorie de produit">
                            <button  type="submit" class="btn btn-primary btn-sm my-2 my-sm-0"><i class="fa fa-search"></i> Rechercher</button>
                        </form>
                                    
                                     
                        <ul class="navbar-nav mr-auto text-center" style=" margin: 0 auto; font-size: 17px;">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-heart"></i> Nos magasin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="connect.php"><i class="fa fa-user" ></i> Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-heart"></i> Ma liste</a>
                            </li><li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa- fa-shopping-cart"></i> Mon panier</a>
                            </li>

                        </ul>
                    </div>
                </nav>
                        
            </div>
        </nav>
    </header>
    
    <section class="header_third" >
            <div class="container">
                <div class="row ">
                    <div class="list-group list-group-horizontal" style="width: 100%;">
                        <div class="col-lg-3 nopadding"  onmouseover="over()" onmouseout="disover()">
                            <a id="nos_produits" class="list-group-item" href="#" style="background: #585858; color: #fff; border-bottom: 5px solid #404040;">
                                <i style="font-size:24px" class="fa">&#xf0c9;</i>  <span style="margin-left: 10px;">Nos produits</span>
                            </a>
                        </div>
                        <div class="col-lg-3 nopadding"> <a class="list-group-item " href="#">Nos services</a></div>
                        <div class="col-lg-3 nopadding">  <a class="list-group-item " href="#">Contactez nous</a></div>
                        <div class="col-lg-3 nopadding">  <a class="list-group-item " href="#">Nos magasin</a></div>
                    </div>
                    <div class="col-lg-3 nopadding" onmouseover="over()" onmouseout="disover()">
                        <div class="list-group list-group-vertical" id="nos_produits_desc">
                            <a class="list-group-item " href="#">Catégorie 1</a>
                            <a class="list-group-item " href="#">Catégorie 2</a>
                            <a class="list-group-item " href="#">Catégorie 3</a>
                            <a class="list-group-item " href="#">Catégorie 4</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
-->
        
            <header>   
                         
            <div class="container">
                <div class="row">
                    <nav class=" navbar navbar-expand-lg navbar-light bg-company-green col-lg-12" style="color: #fff;">
                        <div class="col-lg-2" >
                            <a href="../../index.php"><img class="img-fluid" src="../image/LOGO.png"  ></a>  
                        </div>
                        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="col-lg-10">
                        
                            <nav class="navbar navbar-expand-lg navbar-default bg-green" >
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto" style="border-bottom: 1px solid #fff;">
                                        <li class="nav-item" >
                                            <a class="nav-link" href="contact.php"><i class="fa fa-phone"></i> Contactez-nous</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="place.php"><i class="fa fa-map-marker"></i> Nos magasins</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="depliant.php"><i class="fa fa-book"></i> Nos dépliant</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="developpers.php"><i class="fa fa-cog"></i> Développeurs du site</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        
                            <nav class="navbar navbar-expand-lg navbar-light bg-company-green">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <form  style="width: 55%; " action="categorie.php" method="post">
                                        <input type="text" class="form-control" maxlength="20" name="search" placeholder="Tapez ici un produit ou une catégorie de produit">
                                        <button  type="submit" class="btn btn-primary btn-sm my-2 my-sm-0"><i class="fa fa-search"></i> Rechercher</button>
                                    </form>

                                    <ul style="margin-left: 40px;" class="navbar-nav mr-auto">
                                        <li class="nav-item" >
                                            <?php 
                                                    if(!$conect)
                                                        echo '<a class="nav-link" href="connect.php"><i class="fa fa-user fa-big"></i><br> Se connecter</a>';
                                                    else
                                                        echo '<a class="nav-link" href="connected.php"><i class="fa fa-user fa-big"></i><br> '.$name.'</a>';
                                                    
                                                ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php 
                                                    if(!$conect)
                                                        echo '<a class="nav-link" href="connect.php"><i class="fa fa-heart fa-big"></i><br> Ma liste</a>';
                                                    else
                                                        echo '<a class="nav-link" href="myliste.php"><i class="fa fa-heart fa-big"></i><br> Ma liste</a>';
                                                    
                                            ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php 
                                                    if(!$conect)
                                                        echo '<a class="nav-link" href="connect.php"><i class="fa fa- fa-shopping-cart fa-big"></i><br> Commande</a>';
                                                    else
                                                        echo '<a class="nav-link" href="commande.php"><i class="fa fa- fa-shopping-cart fa-big"></i><br> Commande</a>';
                                                    
                                            ?>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        
                        </div>
                    </nav>
                </div>
            </div>

                </header>
    
        
        
        <section class="header_third" >
            <div class="container">
                <div class="row ">
                    <div class="list-group list-group-horizontal" style="width: 100%;">
                        <div class="col-lg-3 nopadding"  data-toggle="collapse" data-target="#NavThird">
                            <a id="nos_produits" class="list-group-item" href="#" style="background: #585858; color: #fff; border-bottom: 5px solid #404040;">
                                <i style="font-size:24px" class="fa">&#xf0c9;</i>  <span style="margin-left: 10px;">Nos produits</span> <i style="margin-left:36px;"class="fa fa-chevron-down" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-lg-3 nopadding"> <a class="list-group-item " href="#service">Nos services</a></div>
                        <div class="col-lg-3 nopadding">  <a class="list-group-item " href="../Pages/contact.php">Contactez nous</a></div>
                        <div class="col-lg-3 nopadding">  <a class="list-group-item " href="../Pages/place.php">Nos magasin</a></div>
                    </div>
                    <div class="col-lg-3 collapse nopadding NavThird" id="NavThird">
                        <div class="list-group list-group-vertical">
                            <a class="list-group-item " href="categorie.php?cat=PAUTEAUX">PAUTEAUX</a>
                            <a class="list-group-item " href="categorie.php?cat=CABLE">CÂBLES</a>
                            <a class="list-group-item " href="categorie.php?cat=BASE">BASE</a>
                            <a class="list-group-item " href="categorie.php?cat=AUTRE">AUTRES</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        
    
      
<!--      Type des catégorie debut  -->
        <section class="categorie_desc" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 hearchy">
                        <i class="fa fa-home"></i> / <small > PAUTEAUX </small>
                    </div>
                    <div class="col-lg-12">

                        <h3>Choisir UN produit</h3>
                    </div>
                    <?php
                        for($i=0;$i<count($p);$i++){
                            echo '<div onmouseenter="incXhover('.$p[$i][0].')" class="col-lg-4">';
                                echo '<div class="one_categorie">';
                                echo '<div class="item">';
                                echo '<a href="product.php?idp='.$p[$i][0].'"><img src="../pimg/'.$p[$i][10].'" class="img-fluid"></a>';
                                echo '<h5><a href="product.php?idp='.$p[$i][0].'"> '.$p[$i][1].' </a></h5>';
                                echo '<h6 style="font-size:10px;">CODE: Px'.(intval($p[0])*3+173).'</h6>';
                            echo '<div class="prix">';
                                echo '<span class="price" style="font-size:29px;">'.$p[$i][7].' DH</span>';
                            echo '</div>';
                            echo '<a style="color:#fff;" href="product.php?idp='.$p[$i][0].'" style="margin-top:20px;" class="btn btn-success form-control"><i  class="fa fa-eye"></i> VOIR</a></div></div></div>';
                        }
                    ?>
                    

                </div>
            </div>
        </section>
<!--        type des catégories fin-->
        
        
        <section class="nos_produits">
            <div class="news">
                <div class="container">
                    <h3>NOS MEILLEURS PRODUITS</h3>
                    <div class="owl-carousel">
                        <?php 
                        
                        for($i=0;$i<count($p2);$i++){
                            echo '<div onmouseenter="incXhover('.$p2[$i][0].')"  class="item">';
                            echo '<a href="product.php?idp='.$p2[$i][0].'"><img src="../pimg/'.$p2[$i][1].'"></a>';
                            echo '<h5>'.$p2[$i][2].'</h5>';
                            echo '<h3><a href="product.php?idp='.$p2[$i][0].'"> '.$p2[$i][3].'</a></h3>';
                            echo '<h6>CODE: Px '. (intval($p2[$i][0])*3+173) .'</h6>';
                            echo '<div class="prix"><span class="price">'.$p2[$i][4].' DH</span></div>';
                            echo '<a href="product.php?idp='.$p2[$i][0].'" class="btn btn-default"><i class="fa fa-shopping-cart"></i> J\'ACHETE</a></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section class="nos_services">
            <div class="container">
                <h3>NOS SERVICES</h3>
                <div class="row">
                    <div class="col-lg-6 servicos">
                        <a href="#"><img src="../image/SERVICE1.JPG"></a>
                        <div class="description">
                            <h3><a href="#">INSTALLATION DE RAISINS</a></h3>
                            <p>Notre service contient des pauteaux qui vont installer chaqu'un a côte de l'autre aussi on a des cable de seclage qui vont mettre des abréviation  </p>
                        </div>
                        <button class="btn btn-default"><i class="fa fa-phone"></i> COMMANDER</button>
                    </div>
                    <div class="col-lg-6 servicos">
                        <a href="#"><img src="../image/SERVICE1.JPG"></a>
                        <div class="description">
                            <h3><a href="#">INSTALLATION DE RAISINS</a></h3>
                            <p id="service">Notre service contient des pauteaux qui vont installer chaqu'un a côte de l'autre aussi on a des cable de seclage qui vont mettre des abréviation  </p>
                        </div>
                        <button class="btn btn-default"><i class="fa fa-phone"></i> COMMANDER</button>
                    </div>
                </div>
            </div>
        </section>
        
        
         <!-- Footer Start -->
	<div class="footer">
		<div class="container">
			<div class="col-3">
				<a href="../Pages/place.php"><p><big>Address MARAKECH:</big><br>Adipisci cum reprehenderit asperiores perferendis amet.</p></a>
				<a href="../Pages/place.php"><p><big>Address BNI MELLAL:</big><br>32°17'49.1"N 6°25'31.0"W</p></a>
				
			</div>
			<div class="col-3">
				<ul>
                    <li><h5><u>Plus d'information</u></h5></li>
					<li><a href="../Pages/contact.php">Contactez-nous</a></li>
					<li><a href="../Pages/place.php">Nos magasins</a></li>
					<li><a href="#">Qui somme nous ?</a></li>
					<li><a href="#">Politique de confidentialité</a></li>
					<li><a href="../Pages/developpers.php">Développeurs du site</a></li>
					<li><a href="../Pages/depliant.php">Nos dépliant</a></li>
				</ul>
			</div>
			<div class="col-3">
				<ul>
					<li><h5><u>Notre site</u></h5></li>
					<li><a href="../Pages/inscrire.php">S'inscrire</a></li>
					<li><a href="../Pages/connect.php">Se connecter</a></li>
                    <?php 
                        if(!$conect){
                            echo '<li><a href="../Pages/connect.php">Mes informations</a></li>';
                        }
                    else {
                        echo '<li><a href="../Pages/connected.php">Mes informations</a></li>';
                    }?>
                    <?php 
                        if(!$conect){
                            echo '<li><a href="../Pages/connect.php">Ma liste</a></li>';
                        }
                    else {
                        echo '<li><a href="../Pages/myliste.php">Ma liste</a></li>';
                    }?>
					
					<?php 
                        if(!$conect){
                            echo '<li><a href="../Pages/connect.php">Mes commandes</a></li>';
                        }
                    else {
                        echo '<li><a href="../Pages/commande.php">Mes commandes</a></li>';
                    }?>
					
                        
                    
                    
					
				</ul>
			</div>
			<div class="col-3">
				<ul>
                    <li>
                        <img src="../image/LOGO.png" class="img-fluid">
                    </li>
					<li style="margin-top: 20px; margin-left:40px; ">
                        <a href="#"><i class="fab fa-instagram fa-3x" style="margin: 0 5px;"></i></a>
                        <a href="#"><i class="fab fa-facebook fa-3x " style="margin: 0 5px;"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-3x " style="margin: 0 5px;"></i></a>
                    </li>
					
					
				</ul>
			</div>            
		</div>
	</div>
        
        <div class="copyright">
		<div class="container">
			<h5>COPYRIGHT © 2020 TOUS LES DROITS SONT RESERVES </h5>
		</div>
	</div>
	<!-- Footer End -->
        
        
        <script src="../js/xhover2.js"></script>
		<script src="../js/ijs.js"></script>
		<script src="../js/script.js"></script>
    </body>
</html>