<?php 
    	session_start();
    require_once("../../App/classes/connectionClass/StatisticsRun.php");
    $pro=new StatisticsRun();
    $pro->incX(12);
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
    if($conect){
        require_once("../../App/classes/connectionClass/MyListRun.php");
        $mr=new MyListRun();
        $bool=$mr->isInList( $data[0],  $_GET['idp']);
    }
    if(isset($_GET['idp'])){
        require_once("../../App/classes/connectionClass/ProdectRun.php");
        require_once("../../App/classes/connectionClass/CommentRun.php");
        
        $pr= new ProdectRun();
        $p=$pr->getProdectByIdp($_GET['idp']);
        $pr->incXvist($_GET['idp']);
        $cr = new CommentRun();
        $c=$cr->getComByProdect($_GET['idp']);
        $p2= $pr->getAllHomeP();
        
    }else{
        header("location:../../");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Product</title>
        
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        
        <link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="../css/signInStyle.css" type="text/css">
		<link rel="stylesheet" href="../css/smoothproducts.css" type="text/css">
		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/smoothproducts.min.js"></script>
        
        
        
        


    </head>
    <body>
<header>          
            <div class="container">
            <div class="row">
                <nav class=" navbar navbar-expand-lg navbar-light bg-company-green col-lg-12" style="color: #fff;">
                    <div class="col-lg-2" >
                        <a href="../../index.php"><img class="img-fluid" src="../image/logo.png"  ></a>  
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
        
        
        <!-- Product Detail Page Start -->
	<div class="product-detail">
		<div class="container">
			<div class="product-detail-left">
				<div class="sp-wrap">
                    
                    <?php
					 echo '<a href="../pimg/'.$p[10].'"><img src="../pimg/'.$p[10].'" alt=""></a>';
                     echo '<a href="../pimg/'.$p[11].'"><img src="../pimg/'.$p[11].'" alt=""></a>';
                     echo '<a href="../pimg/'.$p[12].'"><img src="../pimg/'.$p[12].'" alt=""></a>';
					?>
				</div>
			</div>
			<div class="product-detail-right">
				<h3><?php echo $p[1]; ?> <br><small>Code : Px<?php echo (intval($p[0])*3+173); ?></small></h3>
				<h5><b>Payé : </b> En boutique</h5>
				<h5><b>Hauteur : </b> <?php echo $p[5]; ?> cm</h5>
				<h5><b>LARGEUR : </b> <?php echo $p[4]; ?> cm</h5>
				<h5><b>LONGUEUR : </b> <?php echo $p[3]; ?> cm</h5>
				<h5><b>TYPE : </b> <?php echo $p[2] ?> </h5>
				<h5><b>Disponibilité : </b> <?php  if($p[8] ==1)echo 'en Stock'; else echo '<sapn style="color:red">Indisponible</span>'; ?></h5>
                <h5><b>PRIX : </b> <?php echo $p[7]; ?> DH</h5>
                
				<div>
                    
				
				<?php
                    
                    if($conect){
                        if($bool)$class="fas";else $class="far";
                        echo '<div class="input-group acheter" >';
                         echo '<div class="input-group-prepend acheteroui ">';
                          echo '<button id="np2" class="btn btn-success " type="button"><i class="fas fa-shopping-cart acheters"></i> </button>';
                         echo '</div>';
                         echo '<input type="number" class="form-control col-lg-4 " id="np"  value="1" min="1">';
                         echo '<div class="input-group-prepend ">';
                          echo '<div href="" class="addtocart"><i id="heart" class="'.$class.' fa-heart"></i> </div>';
                         echo '</div></div>';
                        
                    }else{
                        echo '<div class="input-group ">';
                            echo '<a href="connect.php" class="btn btn-success form-control col-lg-4 acheternon" type="button"><i class="fas fa-shopping-cart"></i></a>';
                            echo '<div class="input-group-prepend ">';
                                echo '<a  href="connect.php" class="addtocart"><i id="heart2" class="far fa-heart" ></i></a>';
                            echo '</div></div>';
                    }    
                    ?>
                </div>
			</div>
			<div class="product-detail-feature">
				<h3>CARACTERISTIQUES :</h3>
                <p>- Grande base pour baser les pauteaux <br> - En stock en Marakkech , Béni Mellal</p>
				<p></p>
				
				
			</div>
		</div>
	</div>
	<!-- Product Detail Page End -->
   
        
<!--        Comment-->
        
        
            <div class="container" >
                <div class="commentaire" >
            <h3 class="comment-text" >Commentaire :</h3>
                    
<!-- Hadi nta3 user -->
            <?php
                if($conect){    
                echo '<div class="form-group">';
                echo'<form method="post" action="../../App/Phpscript/addCom.php?idp='.$p[0].'&idu='.$data[0].'"> ';
                echo '<label for="comment" >Comment:</label>';
                echo '<textarea name="com"  class="form-control" rows="3" id="comment"></textarea>';
                echo '<input type="submit" value="Commenter" name="btnS" class="btn btn-primary float-right m-2"></form>';
                echo '<br></div>';}
                    ?>
<!-- fin  Hadi nta3 user -->
                    
            <div class="col-lg-12 card" >
                <?php
                    if(!$conect){
                        for($i=0;$i<count($c);$i++){
                        echo  '<div class="row" ><div class="col-md-1"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" style="width:100%;"/></div><div class="col-md-11">';
                        echo '<strong class="float-left">'.$c[$i][6].' '.$c[$i][5].' <br> <span class="text-secondary">'.$c[$i][2].'</span> </strong>';
                        echo '<div class="clearfix"></div><p >'.$c[$i][1].'</p></div></div>';
                        $r=$cr->getAllReplysByComent($c[$i][0]);
                        echo '<div class="card-inner"><div class="card-body">';    
                        for($j=0;$j<count($r);$j++){
                            echo '<div class="row"><div class="col-md-1">';
                            echo '<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" style="width:100%;"></div><div class="col-md-11">';
                            echo '<strong >'.$r[$j][4].' '.$r[$j][5].' <br> <span class="text-secondary">'.$r[$j][2].'</span> </strong>';
                            echo '<div ></div><p >'.$r[$j][1].'</p></div></div>';
                        }  echo '</div></div>';  
                        }
                    }else{
                        {
                        for($i=0;$i<count($c);$i++){
                        echo  '<div class="row" ><div class="col-md-1"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" style="width:100%;"/></div><div class="col-md-11">';
                        echo '<strong class="float-left">'.$c[$i][6].' '.$c[$i][5].' <br> <span class="text-secondary">'.$c[$i][2].'</span> </strong>';
                        echo '<div class="clearfix"></div><p >'.$c[$i][1].'</p>';
                        
                            echo  '<form method="post" action="../../App/Phpscript/addRep.php?idu='.$data[0].'&idc='.$c[$i][0].'&idp='.$p[0].'">';    
                        echo '<textarea name="relp" style="display :none" class="form-control" rows="3" id="r'.$c[$i][0].'" ></textarea>';
                        echo '<button type="button" onclick="A('.$c[$i][0].')" name="bb1" id="b'.$c[$i][0].'" class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Répondre</button>';
                        echo '<input type="submit" id="bs'.$c[$i][0].'" name="bb2"  class="float-right btn btn-outline-success ml-2" value="répondre" style="display :none">';
                    echo '</form></div></div>';
                        
                            $r=$cr->getAllReplysByComent($c[$i][0]);
                            echo '<div class="card-inner"><div class="card-body">';
                        for($j=0;$j<count($r);$j++){
                            echo '<div class="row"><div class="col-md-1">';
                            echo '<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" style="width:100%;"></div><div class="col-md-11">';
                            echo '<strong >'.$r[$j][4].' '.$r[$j][5].' <br> <span class="text-secondary">'.$r[$j][2].'</span> </strong>';
                            echo '<div ></div><p >'.$r[$j][1].'</p></div></div>';
                        }  echo '</div></div>';    
                        }
                    }
                    }
                 ?>

            
           
            </div>
        </div>
        </div>
        
        
        
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
        
        
        
        <section class="nos_services" >
            <div class="container">
                <h3>NOS SERVICES</h3>
                <div class="row">
                    <div class="col-lg-6 servicos">
                        <a href="../Pages/contact.php"><img src="../image/SERVICE1.JPG"></a>
                        <div class="description">
                            <h3><a href="../Pages/contact.php">INSTALLATION DE RAISINS</a></h3>
                            <p>Notre service contient des pauteaux qui vont installer chaqu'un a côte de l'autre aussi on a des cable de seclage qui vont mettre des abréviation  </p>
                        </div>
                        <a href="../Pages/contact.php" class="btn btn-default"><i class="fa fa-phone"></i> COMMANDER</a>
                    </div>
                    <div class="col-lg-6 servicos">
                        <a href="../Pages/contact.php"><img src="../image/SERVICE1.JPG"></a>
                        <div class="description">
                            <h3><a href="../Pages/contact.php">INSTALLATION DE RAISINS</a></h3>
                            <p id="service">Notre service contient des pauteaux qui vont installer chaqu'un a côte de l'autre aussi on a des cable de seclage qui vont mettre des abréviation  </p>
                        </div>
                        <a href="../Pages/contact.php" class="btn btn-default"><i class="fa fa-phone"></i> COMMANDER</a>
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
	<!-- Footer End -->

	
	<div class="copyright">
		<div class="container">
			<h5>COPYRIGHT © 2020 TOUS LES DROITS SONT RESERVES </h5>
		</div>
	</div>
        
        
    </body>
    <input value="<?php if($bool) echo 1;else echo 0 ?>" id="ccc3" style="display :none" >
    <input value="<?php echo $data[0]; ?>" id="ccc1" style="display :none" >
    <input value="<?php echo $_GET['idp']; ?>" id="ccc2" style="display :none" >
    <script src="../js/pjs.js"></script>
    <script src="../js/com.js"></script>
    <script src="../js/xhover2.js"></script>
    
   
</html>