<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    	session_start();

    require_once("../../classes/assistClass/assist.class.php");
    
    $conect =false;
    if(isset($_SESSION['steSA']) and $_SESSION['steSA'] === assist::getCode()){
        $conect =true;
    }else{
        $conect =false;
    }        
   if(!$conect){
        header("location:../");
   }else{
    require_once('../../classes/connectionClass/userRun.php');
    require_once('../../classes/connectionClass/ProdectRun.php');
    require_once('../../classes/connectionClass/FeedBackRun.php');
    require_once('../../classes/connectionClass/demandRun.php');  
    require_once('../../classes/connectionClass/StatisticsRun.php'); 
       $ur = new UserRun();
       $n = count($ur->getAllUsers());
       $pr = new ProdectRun();
       $n2 = count($pr->getAlllProdects()); 
       $dr = new DemandRun();
       $n3=$dr->getNSD();
       $n4=$dr->getNVD();
       $n5=$dr->getNCD();
       $fbr = new FeedBackRun();
       $n6=$fbr->getNFB();
       $sr=new StatisticsRun();
       $n7=$sr->getSumVX();
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
        
        
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/b7ed035385.js"></script>
        
        

    </head>
    
    <body>
  

<!--
        <nav class="navbar navbar-expand mb-4 shadow">
            <a href="home.php"><img src="image/electropla.png" width="100px;"></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown">
                        <i class="fas fa-envelope fa-fw"></i>
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Les messages
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="#" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="small text-gray-500">MHAND Youssef · 1H</div>
                                <div class="text-truncate">Bonjour je voudrais vous dire que je veux annulé ma denière commande</div>
                            </div>
                        </a>
                
                        <a class="dropdown-item text-center small text-gray-500" href="#">Lire tous les messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>
                
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">MHAND Youssef</span>
                        <img class="rounded-circle" src="../admin/image/user.png" width="45px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Mon compte
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Paramètre
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Mes activités
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Se déconnecter
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
-->
        
        <header>
            <div class="container">
                <a href="home.php" title="Accueil"><img class="mx-auto d-block" src="image/LOGO.png" ></a>
            </div>
        </header>
        
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-2 left-nav" >
                    <ul class="list-group"> 
                        <a href="home.php" ><li class="list-group-item active"><i class="fa fa-home"></i> Accueil</li></a>
                        <a href="user.php" ><li class="list-group-item"><i class="fa fa-user"></i> Utilisateur</li></a>
                        <a data-toggle="collapse" data-target="#ProductCollapse" href="#"><li class="list-group-item"><i class="fas fa-dice-d6 " ></i> Produits</li></a>
                        <li class="list-group-item collapse" id="ProductCollapse">
                                <ul>
                                    <li><a href="product.php"> Afficher</a></li>
                                    <li><a href="productadd.php"> Ajouter</a></li>
                                </ul>
                        </li>
                        <a data-toggle="collapse" data-target="#DemandeCollapse" href="#"><li class="list-group-item"><i class=" fas fa-shopping-cart "></i> Commande</li></a>
                        <li class="list-group-item collapse" id="DemandeCollapse">
                                <ul>
                                    <li><a href="demande.php">Non valide</a></li>
                                    <li><a href="demandeencour.php"> En cours</a></li>
                                    <li><a href="demandevalide.php"> Valide</a></li>
                                </ul>
                        </li>
                        <a data-toggle="collapse" data-target="#StatistiqueCollapse" href="#"><li class="list-group-item "><i class="fa fa-pie-chart "></i> Statistique</li></a>
                        <li class="list-group-item collapse" id="StatistiqueCollapse">
                                <ul>
                                    <li ><a href="statistique.php">Produit</a></li>
                                    <li ><a href="statistiquepages.php"> Pages</a></li>
                            </ul>
                        </li>
                        <a href="message.php"><li class="list-group-item"><i class="fa fa-envelope"></i> Message</li></a>
                        <a href="carousel.php"><li class="list-group-item "><i class="fas fa-image"></i> Carousel</li></a>
                    </ul>
                </div>
                <div class="col-lg-10"> 
                    <div class="middle-home">
                    <h3>Page d'acceuil</h3>
                        <div class="row">
                            <div class="col-lg-3 center">
                                <a href="user.php"><i class="rounded-circle fa fa-user fa-3x green"><sup> <span class="badge badge-warning badge-counter"><?php echo $n; ?></span></sup><span class="title-icon"><br>Utilisateur</span></i></a>
                            </div>
                            <div class="col-lg-3 center">
                                <a href="product.php"><i class="rounded-circle fas fa-dice-d6 fa-3x green" ><sup> <span class="badge badge-warning badge-counter"><?php echo $n2; ?></span></sup><span class="title-icon"><br>Produit</span></i></a>
                            </div>
                            <div class="col-lg-3 center">
                                <a href="statistique.php"><i class="rounded-circle 	fa fa-pie-chart fa-3x green"><sup></sup><span class="title-icon"><br>Statistique Produit</span></i></a>
                            </div>
                            <div class="col-lg-3 center">
                                <a href="statistiquepages.php"><i class="rounded-circle fa fa-line-chart fa-3x green"><sup> </sup><span class="title-icon"><br>Statistique Pages </span></i></a>
                            </div>
                            <div class="col-lg-12" style="margin: 15px 0;"></div>
                            
                            <div class="col-lg-3 center">
                                <a href="demande.php"><i class="rounded-circle  fas fa-cart-arrow-down fa-3x green"><sup> <span class="badge badge-danger badge-counter"><?php echo $n3; ?></span></sup><span class="title-icon"><br>Commande non valide </span></i></a>
                            </div>
                            <div class="col-lg-3 center">
                                <a href="demandeencour.php"><i class="rounded-circle fas fa-shopping-basket fa-3x green"><sup> <span class="badge badge-danger badge-counter"><?php echo $n4; ?></span></sup><span class="title-icon"><br>Commande en cour </span></i></a>
                            </div>
                            <div class="col-lg-3 center">
                                <a href="demandevalide.php"><i class="rounded-circle fas fa-shopping-cart fa-3x green"><sup> <span class="badge badge-danger badge-counter"><?php echo $n5; ?></span></sup><span class="title-icon"><br>Commande valide </span></i></a>
                            </div>
                            <div class="col-lg-3 center">
                                <a href="message.php"><i class="rounded-circle fa fa-envelope fa-3x green"><sup> <span class="badge badge-danger badge-counter"><?php echo $n6; ?></span></sup><span class="title-icon"><br>Message </span></i></a>
                            </div>
                            <div class="col-lg-12" style="margin: 15px 0;"></div>
                            <div class="col-lg-12 center" style="margin: 15px 0;"><a href="statistiquepages.php"><i class="rounded-circle fa fa-eye fa-3x green"><sup></sup><span class="title-icon"><br>Nombre des visiteurs </span></i></a>
                                <br><span style="font-size:40px; color: #33ff77" class="badge  badge-counter"><?php echo $n7; ?></span>
                            </div>
                            
                            
                            
                        </div>   
                    </div>
                    
                    <div class="col-lg-9"></div>
                </div>
            </div>
        </div>
        
        
       
        
    </body>
    
    
    
</html>