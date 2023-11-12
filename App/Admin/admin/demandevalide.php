<?php 
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
       require_once('../../classes/connectionClass/demandRun.php');
       $dr=new DemandRun();
       $ud= $dr->getReadyDemand(); 
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
       <header>
            <div class="container">
                <a href="home.php"><img class="mx-auto d-block" src="image/LOGO.png" ></a>
            </div>
        </header>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 left-nav" >
                    <ul class="list-group"> 
                        <a href="home.php"><li class="list-group-item"><i class="fa fa-home"></i> Accueil</li></a>
                        <a href="user.php"><li class="list-group-item"><i class="fa fa-user"></i> Utilisateur</li></a>
                        <a data-toggle="collapse" data-target="#ProductCollapse" href="#"><li class="list-group-item"><i class="fas fa-dice-d6 " ></i>  Produits</li></a>
                        <li class="list-group-item collapse" id="ProductCollapse">
                                <ul>
                                    <li><a href="product.php"> Afficher</a></li>
                                    <li><a href="productadd.php"> Ajouter</a></li>
                                </ul>
                        </li>
                        <a data-toggle="collapse" data-target="#DemandeCollapse" href="#"><li class="list-group-item active"><i class=" fas fa-shopping-cart "></i>  Commande</li></a>
                        <li class="list-group-item " id="DemandeCollapse">
                                <ul>
                                    <li ><a href="demande.php">Non valide</a></li>
                                    <li ><a href="demandeencour.php"> En cours</a></li>
                                    <li class="actived"><a href="demandevalide.php"> Valide</a></li>
                                </ul>
                        </li>
                        <a data-toggle="collapse" data-target="#StatistiqueCollapse" href="#"><li class="list-group-item "><i class="fa fa-pie-chart "></i>  Statistique</li></a>
                        <li class="list-group-item collapse" id="StatistiqueCollapse">
                                <ul>
                                    <li ><a href="statistique.php">Produit</a></li>
                                    <li ><a href="statistiquepages.php"> Pages</a></li>
                            </ul>
                        </li>
                        <a href="message.php"><li class="list-group-item"><i class="fa fa-envelope"></i> Message</li></a>
                        <a href="carousel.php"><li class="list-group-item "><i class="fa fa-image"></i> Carousel</li></a>
                    </ul>
                </div>
               
                <div class="col-lg-10"> 
                    <div class="middle-home">
                        <h3>Demande valide</h3>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar"> 
                            <table  class="table border">
                                <?php
                                for($i=0;$i<count($ud);$i++){  
                                echo '<table id="th'.$ud[$i][0].'" style="border-radius: 20px; width:100%;" class="head-commande">';
                                echo    '<tr><td ><a href="userdetail.php">'.$ud[$i][5].' '.$ud[$i][4].'</a></td>';
                                        echo '<td >'.$ud[$i][6].'</td>';
                                        echo '<td >'.$ud[$i][7].'</td>';
                                        echo '<td >'.$ud[$i][3].'</td>';
                                        echo '<td ><button class="btn btn-warning btn-sm">'.$ud[$i][2].'</button> </td>';
                                        echo '<td class="float-right">';
                                            echo '<button type="button" onclick="deletedem('.$ud[$i][0].')" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>';
                                            echo'<button data-toggle="collapse" data-target="#d'.$ud[$i][0].'" type="button" class="btn btn-light btn-sm "><i class="fa fa-arrow-down"></i></button>';
                                        echo '</td><td></td></tr></table>';
                                  $data=$dr->getReadyDemandByIdd($ud[$i][0]);
                                
                                        
                                echo '<table id="d'.$ud[$i][0].'" class="collapse body-commande table" style="width: 95%;">';
                                echo    '<tr><th>ID</th><th>Nom</th><th>Catégorie</th><th>Quantité</th><th colspan="2">Prix</th></tr><tr>';
                                  for($j=0;$j<count($data);$j++){
                                        echo '<td>Px'.(intval($data[$j][1])*3+173).'</td>';
                                        echo '<td>'.$data[$j][2].'</td>';
                                        echo'<td>'.$data[$j][3].'</td>';
                                        echo'<td>'.$data[$j][4].'</td>';
                                        echo '<td colspan="2">'.$data[$j][5].' DH</td></tr>';
                                    }echo '<tr><th colspan="6" class="facture" >Facture : 9000 DH</th></tr></table><br>';
                                }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
        <script src="js/dem.js"></script>

    
    
</html>