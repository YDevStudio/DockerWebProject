<?php 
    	session_start();
    require_once("../../App/classes/connectionClass/StatisticsRun.php");
    $pro=new StatisticsRun();
    $pro->incX(3);
    require_once("../../App/classes/connectionClass/userRun.php");
    require_once("../../App/classes/connectionClass/demandRun.php");
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
     if(!$conect){
        header("location:../../");
   }else {
         $dr= new DemandRun();
         $d1=$dr->getCurrentDemand($data[0]);
         $d2=$dr->getSentDemandByUser($data[0]);
         $d3=$dr->getValidDemandByUser($data[0]);
         $d4=$dr->getReadyDemandByUser($data[0]);
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
        
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        
        

    </head>
    <body>

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
                            <a id="nos_produits" class="list-group-item" href="" style="background: #585858; color: #fff; border-bottom: 5px solid #404040;">
                                <i style="font-size:24px" class="fa">&#xf0c9;</i>  <span style="margin-left: 10px;">Nos produits</span> <i style="margin-left:36px;"class="fa fa-chevron-down" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-lg-3 nopadding"> <a class="list-group-item " href="../../index.php#service">Nos services</a></div>
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
    
        <div class="container" >
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-user-nav">
                        <ul>
                            <a href="connected.php" ><li><i class="fa fa-user"></i> Mes informations</li></a>
                            <a href="commande.php"><li class="actived"><i class="fa fa- fa-shopping-cart fa-big"></i> Mes commandes</li></a>
                            <a href="myliste.php"><li ><i class="fa fa-heart"></i> Ma liste</li></a>
                            <a href="../../App/Phpscript/logout.php"><li class="disconnect"><i class="fas fa-sign-out-alt"></i> Me déconnecter</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 middle-commande">
                    <div class="commande-actu">
                        <div class="col-lg-12 title_commande"> 
                                <table style="border-radius: 50px; width:100%;">
                                    <h4>Ma commade</h4>
                                </table>
                                
                                <div id="MaCommande" class=" MaCommande">
                                    <?php 
                                    if(count($d1)==0)
                                    echo '<div class="row menu"><div class="col-lg-12"><div class="alert alert-info">Il n\'y a aucune produits</div></div></div>';
                                    else{echo '<div class="row menu">';
                                        for($i=0;$i<count($d1);$i++){ 
                                         echo '<div id="in'.$d1[$i][0].'" class="col-lg-4">';
                                            echo '<a href="product.php?idp='.$d1[$i][0].'"><img class="img-fluid rounded " src="../pimg/'.$d1[$i][2].'"></a>';
                                        echo '</div>';
                                        echo '<div id="pn'.$d1[$i][0].'" class="col-lg-6">';
                                            echo '<div class="first-desc">';
                                                echo '<h3><a href="product.php?idp='.$d1[$i][0].'">'.$d1[$i][1].' <br><span class="code">CODE: '.(intval($d1[$i][0])*3+173).'</span></a></h3>';
                                                echo '<h3>'.$d1[$i][3].' DH</h3>';
                                                echo '<h3>Np : '.$d1[$i][4].' pieceS</h3>';
                                            echo '</div></div>';
                                        
                                        echo '<div id="btn'.$d1[$i][0].'" class="col-lg-2 "><button onclick="deleteItem('.$data[0].','.$d1[$i][0].')" style="margin-top:40px;" class=" btn btn-danger btn-lg"><i class="fa fa-trash fa-2x" ></i></button></div>';    
                                        }echo '<div id="xsx" class="col-lg-12 "><a href="../../App/Phpscript/sendDem.php?id='.$data[0].'" class="btn btn-success float-right"  style="width:100%; padding: 10px 0;"> Envoyer</a>
                                    </div></div>';
                                    }
                                    ?>
                                    
                                    
                        </div>
                    </div>
                    <div class="commande-nonvalide">
                        <div class="col-lg-12"> 
                            <table class="table border">
                                <table style=" width:100%;">
                                    <tr class="title">
                                        <td><h4>Commande non valide <span class="badge badge-danger badge-counter float-right"><?php echo count($d2);  ?></span></h4>   </td>
                                        
                                    </tr>
                                </table>
                                
                                
                                <div class="CommandeNonValide">
                                    <?php
                                    if(count($d2)==0)
                                         echo '<div class="row menu"><div class="col-lg-12"><div class="alert alert-info"> aucune comandes trouvée</div></div></div>';
                                    else{
                                    for($j=0;$j<count($d2);$j++){
                                         echo '<table style=" width:100%;" ><tr><th style="padding-left:20px;"><h5>Commande '.$d2[$j][0].'</h5> </th>';
                                            echo '<td ><button data-toggle="collapse" data-target="#d2'.$d2[$j][0].'" type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-arrow-down"></i></button></td></tr></table>';echo '<br>';
                                        
                                   
                                
                                echo '<div id="d2'.$d2[$j][0].'" class="collapse CommandeNonValide1">';
                                    echo '<table class="table border" style="background:none;"> ';
                                        $d2d=$dr->getSentDemandByIdd($d2[$j][0]);
                                         $bill= $dr->getBillByDemand($d2[$j][0])[0];
                                        echo '<table id="d2'.$d2[$j][0].'" class="collapse body-commande table" style="width: 95%;">';
                                echo    '<tr><th>ID</th><th>Nom</th><th>Quantité</th><th colspan="2">Prix</th></tr><tr>';
                                        for($j2=0;$j2<count($d2d);$j2++){
                                
                                  
                                        echo '<td>Px'.(intval($d2d[$j2][1])*3+173).'</td>';
                                        echo '<td>'.$d2d[$j2][2].'</td>';
                                        echo'<td>'.$d2d[$j2][4].'</td>';
                                        echo '<td colspan="2">'.$d2d[$j2][5].' DH</td></tr>';
                                    }echo '<tr><th colspan="6" class="facture" >Facture : '.$bill.' DH</th></tr></table><br>';

                                    echo '</table></div>';
                                    }
                                    
                                    }  
                                    ?>
                                </div>
                            </table>                            
                        </div>
                    </div>
                    
                    <div class="commande-encour">
                        <div class="col-lg-12"> 
                            <table  class="table border">
                                <table style="border-radius: 20px; width:100%;">
                                    <tr class="title">
                                        <td><h4>Commande en traitement  <span class="badge badge-danger badge-counter float-right"><?php echo count($d3);  ?></span></h4>   </td>
                                        
                                    </tr>
                                </table>
                                
                                
                                <div class=" CommandeEnCour">
                                     <?php
                                    if(count($d3)==0)
                                         echo '<div class="row menu"><div class="col-lg-12"><div class="alert alert-info"> aucune comandes trouvée</div></div></div>';
                                    else{
                                    for($j=0;$j<count($d3);$j++){
                                         echo '<table style=" width:100%;" ><tr><th style="padding-left:20px;"><h5>Commande '.$d3[$j][0].'</h5> </th>';
                                            echo '<td ><button data-toggle="collapse" data-target="#d2'.$d3[$j][0].'" type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-arrow-down"></i></button></td></tr></table>';echo '<br>';
                                        
                                   
                                
                                echo '<div id="d2'.$d3[$j][0].'" class="collapse CommandeNonValide1">';
                                    echo '<table class="table border" style="background:none;"> ';
                                        $d3d=$dr->getValidDemandByIdd($d3[$j][0]);
                                         $bill= $dr->getBillByDemand($d3[$j][0])[0];
                                        echo '<table id="d2'.$d3[$j][0].'" class="collapse body-commande table" style="width: 95%;">';
                                echo    '<tr><th>ID</th><th>Nom</th><th>Quantité</th><th colspan="2">Prix</th></tr><tr>';
                                        for($j2=0;$j2<count($d3d);$j2++){
                                
                                  
                                        echo '<td>Px'.(intval($d3d[$j2][1])*3+173).'</td>';
                                        echo '<td>'.$d3d[$j2][2].'</td>';
                                        echo'<td>'.$d3d[$j2][4].'</td>';
                                        echo '<td colspan="2">'.$d3d[$j2][5].' DH</td></tr>';
                                    }echo '<tr><th colspan="6" class="facture" >Facture : '.$bill.' DH</th></tr></table><br>';

                                    echo '</table></div>';
                                    }
                                    
                                    }  
                                    ?>
                                    
                                </div>
                                
                                
                                
                            </table>
                        </div>
                    </div>
                    
                    <div class="commande-valide">
                        <div class="col-lg-12"> 
                            <table  class="table border">
                                <table style=" width:100%;">
                                    <tr class="title">
                                        <td><h4>Commande terminer  <span class="badge badge-danger badge-counter float-right"><?php echo count($d4);  ?></span></h4>   </td>
                                        
                                    </tr>
                                </table>
                                
                                
                                <div class=" CommandeValide">
                                    <?php
                                    if(count($d4)==0)
                                         echo '<div class="row menu"><div class="col-lg-12"><div class="alert alert-info"> aucune comandes trouvée</div></div></div>';
                                    else{
                                    for($j=0;$j<count($d4);$j++){
                                         echo '<table style=" width:100%;" ><tr><th style="padding-left:20px;"><h5>Commande '.$d4[$j][0].'</h5> </th>';
                                            echo '<td ><button data-toggle="collapse" data-target="#d2'.$d4[$j][0].'" type="button" class="btn btn-light btn-sm float-right"><i class="fa fa-arrow-down"></i></button></td></tr></table>';echo '<br>';
                                        
                                   
                                
                                echo '<div id="d2'.$d4[$j][0].'" class="collapse CommandeNonValide1">';
                                    echo '<table class="table border" style="background:none;"> ';
                                        $d4d=$dr->getReadyDemandByIdd($d4[$j][0]);
                                         $bill= $dr->getBillByDemand($d4[$j][0])[0];
                                        echo '<table id="d2'.$d4[$j][0].'" class="collapse body-commande table" style="width: 95%;">';
                                echo    '<tr><th>ID</th><th>Nom</th><th>Quantité</th><th colspan="2">Prix</th></tr><tr>';
                                        for($j2=0;$j2<count($d4d);$j2++){
                                
                                  
                                        echo '<td>Px'.(intval($d4d[$j2][1])*3+173).'</td>';
                                        echo '<td>'.$d4d[$j2][2].'</td>';
                                        echo'<td>'.$d4d[$j2][4].'</td>';
                                        echo '<td colspan="2">'.$d4d[$j2][5].' DH</td></tr>';
                                    }echo '<tr><th colspan="6" class="facture" >Facture : '.$bill.' DH</th></tr></table><br>';

                                    echo '</table></div>';
                                    }
                                    
                                    }  
                                    ?>
                                </div>
                                
                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        
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
    
    
		<script src="../js/ijs.js"></script>
		<script src="../js/script.js"></script>
        <script src="../js/demajax.js"></script>
        
    </body>
    
</html>