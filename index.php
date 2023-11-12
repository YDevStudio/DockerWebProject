<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    	session_start();
    require_once("App/classes/connectionClass/StatisticsRun.php");
    $pro=new StatisticsRun();
    $pro->incX(1);
    require_once("App/classes/connectionClass/userRun.php");
    require_once("App/classes/assistClass/assist.class.php");
    require_once('App/classes/connectionClass/ProdectRun.php');
       $pr=new ProdectRun();
       $p= $pr->getAllHomeP();
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

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Site</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="public/css/owl.carousel.min.css">
        <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
        
        <link rel="stylesheet" href="public/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    	<script src="public/js/owl.carousel.min.js"></script>
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
                                <a class="nav-link" href="#"><i class="fa fa-heart" ></i> Ma liste</a>
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
                        <a href="index.php"><img class="img-fluid" src="public/image/LOGO.png"  ></a>  
                    </div>
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-lg-10">
                        
                        <nav class="navbar navbar-expand-lg navbar-default bg-green" >
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto" style="border-bottom: 1px solid #fff;">
                                        <li class="nav-item" >
                                            <a class="nav-link" href="public/Pages/contact.php"><i class="fa fa-phone"></i> Contactez-nous</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="public/Pages/place.php"><i class="fa fa-map-marker"></i> Nos magasins</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="public/Pages/depliant.php"><i class="fa fa-book"></i> Nos dépliant</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="public/Pages/developpers.php"><i class="fa fa-cog"></i> Développeurs du site</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        
                        <nav class="navbar navbar-expand-lg navbar-light bg-company-green">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <form  style="width: 55%; " action="public/Pages/categorie.php" method="post">
                                        <input type="text" class="form-control" maxlength="20" name="search" placeholder="Tapez ici un produit ou une catégorie de produit">
                                        <button  type="submit" class="btn btn-primary btn-sm my-2 my-sm-0"><i class="fa fa-search"></i> Rechercher</button>
                                    </form>

                                    <ul style="margin-left: 50px;" class="navbar-nav mr-auto">
                                        <li class="nav-item" >
                                            <?php 
                                                    if(!$conect)
                                                        echo '<a class="nav-link" href="public/Pages/connect.php"><i class="fa fa-user fa-big"></i><br> Se connecter</a>';
                                                    else
                                                        echo '<a class="nav-link" href="public/Pages/connected.php"><i class="fa fa-user fa-big"></i><br> '.$name.'</a>';
                                                    
                                            ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php 
                                                    if(!$conect)
                                                        echo '<a class="nav-link" href="public/Pages/connect.php"><i class="fa fa-heart fa-big"></i><br> Ma liste</a>';
                                                    else
                                                        echo '<a class="nav-link" href="public/Pages/myliste.php"><i class="fa fa-heart fa-big"></i><br> Ma liste</a>';
                                                    
                                            ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php 
                                                    if(!$conect)
                                                        echo '<a class="nav-link" href="public/Pages/connect.php"><i class="fa fa- fa-shopping-cart fa-big"></i><br> Commande</a>';
                                                    else
                                                        echo '<a class="nav-link" href="public/Pages/commande.php"><i class="fa fa- fa-shopping-cart fa-big"></i><br> Commande</a>';
                                                    
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
    
<!--
    <section class="header_third">
        <div class="container">
          <div class="row">
              <div class="list-group list-group-horizontal" style="width: 100%">
                  <div class="col-lg-3 nopadding">
                      <div class="dropdown">
                          <a class="dropdown-toggle list-group-item" data-toggle="dropdown" data-hover="dropdown" style="cursor: pointer;" >
                              Nos services
                          </a>
                              <div class="dropdown-menu ">
                                  <div class="list-group list-group-vertical" style="width: 100%" id="nos_produits_descr">

                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li class="dropdown dropright">
                                      <a class="dropdown-item" href="#">One more dropdown</a>
                                      <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li class="dropdown dropright">
                                              <a class="dropdown-item" href="#">One more dropdown</a>
                                              <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                              </ul>
                                          </li>
                                          <li><a href="#">Something else here</a></li>
                                          <li><a href="#">Separated link</a></li>
                                      </ul>
                                  </li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                                  <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 nopadding"> <a class="list-group-item " href="#">Nos services</a></div>
                  <div class="col-lg-3 nopadding">  <a class="list-group-item " href="#">Contactez nous</a></div>
                  <div class="col-lg-3 nopadding">  <a class="list-group-item " href="#">Nos magasin</a></div>
              
              </div>
          </div>
      </div>
      
      </section>
-->
    
    
    

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
                        <div class="col-lg-3 nopadding">  <a class="list-group-item " href="public/Pages/contact.php">Contactez nous</a></div>
                        <div class="col-lg-3 nopadding">  <a class="list-group-item " href="public/Pages/place.php">Nos magasin</a></div>
                    </div>
                    <div class="col-lg-3 collapse nopadding NavThird" id="NavThird">
                        <div class="list-group list-group-vertical">
                            <a class="list-group-item " href="public/Pages/categorie.php?cat=PAUTEAUX">PAUTEAUX</a>
                            <a class="list-group-item " href="public/Pages/categorie.php?cat=CABLE">CÂBLES</a>
                            <a class="list-group-item " href="public/Pages/categorie.php?cat=BASE">BASE</a>
                            <a class="list-group-item " href="public/Pages/categorie.php?cat=AUTRE">AUTRES</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        
<!--
        <header>   
                         
            <div class="container">
                <div class="row">
                    <nav class=" navbar navbar-expand-lg navbar-light bg-company-green col-lg-12" style="color: #fff;">
                        <div class="col-lg-2" >
                            <a href="index.php"><img class="img-fluid" src="public/image/electropla.png"  ></a>  
                        </div>
                        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="col-lg-10">
                        
                            <nav class="navbar navbar-expand-lg navbar-default bg-green" >
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto" style="border-bottom: 1px solid #fff;">
                                        <li class="nav-item" >
                                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Développer par</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Développer par</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Développer par</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Développer par</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        
                            <nav class="navbar navbar-expand-lg navbar-light bg-company-green">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <form  style="width: 55%; "action="#" method="#">
                                        <input type="text" class="form-control" name="search" placeholder="Tapez ici un produit ou une catégorie de produit">
                                        <button  type="submit" class="btn btn-primary btn-sm my-2 my-sm-0"><i class="fa fa-search"></i> Rechercher</button>
                                    </form>

                                    <ul style="margin-left: 90px;" class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="connect.php"><i class="fa fa-user"></i><br> Se connecter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-heart"></i><br> Ma liste</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa- fa-shopping-cart"></i><br> Mon panier</a>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        
                        </div>
                    </nav>
                </div>
            </div>

            
        </header>
        
        <section class="header_third">
            <div class="container">
                <div class="row" class="list-group list-group-horizontal col-lg-12">
                    <a class="list-group-item " href="#"><i style="font-size:24px" class="fa">&#xf0c9;</i>  Nos produits</a>
                        
                    <a class="list-group-item " href="#">Nos services</a>
                    <a class="list-group-item " href="#">Contactez nous</a>
                    <a class="list-group-item " href="#">Nos magasin</a>
                        
                </div>
            </div>
        </section>
-->
        <div ></div>
        <section class="carousel_center" >
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"> </li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                 
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#"><img src="public/image/IMAGE1.jpg" width="100%" ></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="centered"></h3>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="public/image/IMAGE2.jpg" width="100%">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="centered"></h3>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="public/image/IMAGE3.jpg" width="100%" > 
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="centered"></h3>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        
     
        
        <section class="nos_produits">
            <div class="news">
                <div class="container">
                    <h3>NOS MEILLEURS PRODUITS</h3>
                    <div class="owl-carousel">
                        <?php 
                        
                        for($i=0;$i<count($p);$i++){
                            echo '<div onmouseenter="incXhover('.$p[$i][0].')"  class="item">';
                            echo '<a href="public/Pages/product.php?idp='.$p[$i][0].'"><img src="public/pimg/'.$p[$i][1].'"></a>';
                            echo '<h5>'.$p[$i][2].'</h5>';
                            echo '<h3><a href="public/Pages/product.php?idp='.$p[$i][0].'"> '.$p[$i][3].'</a></h3>';
                            echo '<h6>CODE: Px '. (intval($p[$i][0])*3+173) .'</h6>';
                            echo '<div class="prix"><span class="price">'.$p[$i][4].' DH</span></div>';
                            echo '<a href="public/Pages/product.php?idp='.$p[$i][0].'" class="btn btn-default"><i class="fa fa-shopping-cart"></i> J\'ACHETE</a></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section class="nos_services" >
            <div class="container">
                <h3>NOS SERVICES</h3>
                <div class="row">
                    <div class="col-lg-6 servicos">
                        <a href="public/Pages/contact.php"><img src="public/image/SERVICE1.JPG"></a>
                        <div class="description">
                            <h3><a href="public/Pages/contact.php">INSTALLATION DE RAISINS</a></h3>
                            <p>Notre service contient des pauteaux qui vont installer chaqu'un a côte de l'autre aussi on a des cable de seclage qui vont mettre des abréviation  </p>
                        </div>
                        <a href="public/Pages/contact.php" class="btn btn-default"><i class="fa fa-phone"></i> COMMANDER</a>
                    </div>
                    <div class="col-lg-6 servicos">
                        <a href="public/Pages/contact.php"><img src="public/image/SERVICE2.JPG" width="100%;" height="360px;"></a>
                        <div class="description">
                            <h3><a href="public/Pages/contact.php">INSTALLATION DES SIEGE</a></h3>
                            <p id="service">Notre service contient des pauteaux qui vont installer chaqu'un a côte de l'autre aussi on a des cable de seclage qui vont mettre des abréviation  </p>
                        </div>
                        <a href="public/Pages/contact.php" class="btn btn-default"><i class="fa fa-phone"></i> COMMANDER</a>
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- Footer Start -->
	<div class="footer">
		<div class="container">
			<div class="col-3">
				<a href="public/Pages/place.php"><p><big>Address MARAKECH:</big><br>Adipisci cum reprehenderit asperiores perferendis amet.</p></a>
				<a href="public/Pages/place.php"><p><big>Address BNI MELLAL:</big><br>32°17'49.1"N 6°25'31.0"W</p></a>
				
			</div>
			<div class="col-3">
				<ul>
                    <li><h5><u>Plus d'information</u></h5></li>
					<li><a href="public/Pages/contact.php">Contactez-nous</a></li>
					<li><a href="public/Pages/place.php">Nos magasins</a></li>
					<li><a href="#">Qui somme nous ?</a></li>
					<li><a href="#">Politique de confidentialité</a></li>
					<li><a href="public/Pages/developpers.php">Développeurs du site</a></li>
					<li><a href="public/Pages/depliant.php">Nos dépliant</a></li>
				</ul>
			</div>
			<div class="col-3">
				<ul>
					<li><h5><u>Notre site</u></h5></li>
					<li><a href="public/Pages/inscrire.php">S'inscrire</a></li>
					<li><a href="public/Pages/connect.php">Se connecter</a></li>
                    <?php 
                        if(!$conect){
                            echo '<li><a href="public/Pages/connect.php">Mes informations</a></li>';
                        }
                    else {
                        echo '<li><a href="public/Pages/connected.php">Mes informations</a></li>';
                    }?>
                    <?php 
                        if(!$conect){
                            echo '<li><a href="public/Pages/connect.php">Ma liste</a></li>';
                        }
                    else {
                        echo '<li><a href="public/Pages/myliste.php">Ma liste</a></li>';
                    }?>
					
					<?php 
                        if(!$conect){
                            echo '<li><a href="public/Pages/connect.php">Mes commandes</a></li>';
                        }
                    else {
                        echo '<li><a href="public/Pages/commande.php">Mes commandes</a></li>';
                    }?>
					
                        
                    
                    
					
				</ul>
			</div>
			<div class="col-3">
				<ul>
                    <li>
                        <img src="public/image/LOGO.png" class="img-fluid">
                    </li>
					<li style="margin-top: 20px; margin-left:40px;" >
                        <a href="#"><i class="fab fa-instagram fa-3x" style="margin: 0 5px;"></i></a>
                        <a href="#"><i class="fab fa-facebook fa-3x " style="margin: 0 5px;"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-3x " style="margin: 0 5px;"></i></a>
                    </li>
					
					
				</ul>
			</div>            
		</div>
	</div>
	<!-- Footer End -->

	
	<div class="copyright">
		<div class="container">
			<h5>COPYRIGHT © 2020 TOUS LES DROITS SONT RESERVES </h5>
		</div>
	</div>

        
        <script src="public/js/xhover.js"></script>
		<script src="public/js/ijs.js"></script>
		<script src="public/js/script.js"></script>
        
    </body>
    
    

</html>