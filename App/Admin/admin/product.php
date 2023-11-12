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
       require_once('../../classes/connectionClass/ProdectRun.php');
       $pr = new ProdectRun();
       $p = $pr->getAlllProdects();
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
                        <a href="user.php"><li class="list-group-item "><i class="fa fa-user"></i> Utilisateur</li></a>
                        <a data-toggle="collapse" data-target="#ProductCollapse" href="#"><li class="list-group-item active"><i class="fas fa-dice-d6 " ></i>  Produits</li></a>
                        <li class="list-group-item" id="ProductCollapse">
                                <ul>
                                    <li class="actived"><a href="product.php"> Afficher</a></li>
                                    <li><a href="productadd.php"> Ajouter</a></li>
                                </ul>
                        </li>
                        <a data-toggle="collapse" data-target="#DemandeCollapse" href="#"><li class="list-group-item"><i class=" fas fa-shopping-cart "></i>  Commande</li></a>
                        <li class="list-group-item collapse" id="DemandeCollapse">
                                <ul>
                                    <li><a href="demande.php">Non valide</a></li>
                                    <li><a href="demandeencour.php"> En cours</a></li>
                                    <li><a href="demandevalide.php"> Valide</a></li>
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
                        <h3>Liste des produits</h3>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table">
                                <tr  colspan="12"><a href="productadd.php" class="btn btn-success float-right" style="margin:0 20px 5px 20px;">Ajouter</a></tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Type</th>
                                    <th>Longueur</th>
                                    <th>Largeur</th>
                                    <th>Hauteur</th>
                                    <th>Catégorie</th>
                                    <th>Prix(DH)</th>
                                    <th>En stock</th>
                                    <th>Description</th>
                                    <th colspan="2"></th>
                                </tr>
                                
                                 <?php         
                            for( $i=0 ; $i < count($p) ; $i++){    
                                echo '<tr>';
                                    echo '<td>Px'.(intval($p[$i][0])*3+173) .'</td>';
                                    echo '<td>'.$p[$i][1].'</td>';
                                    echo '<td>'.$p[$i][2].'</td>';
                                    echo '<td>'.$p[$i][3].'</td>';
                                    echo '<td>'.$p[$i][4].'</td>';
                                    echo '<td>'.$p[$i][5].'</td>';
                                    echo '<td>'.$p[$i][6].'</td>';
                                    echo '<td>'.$p[$i][7].'</td>';
                                    if($p[$i][8])
                                        echo '<td><input type="button" id="'.$p[$i][0].'" class="btn btn-success" onclick="YesOrNo('.$p[$i][0].')" value="Oui"> </td>';
                                    else 
                                        echo '<td><input type="button" id="'.$p[$i][0].'" class="btn btn-danger" onclick="YesOrNo('.$p[$i][0].')" value= "Non"></td>';
                                    echo '<td>'.$p[$i][9].'</td>';
                                    echo '<td><div class="d-flex"><a href="productmodify.php?cod='.$p[$i][0].'" class="btn btn-primary">Modifier</a><a href="../ScriptPhpAdmin/deleteProdect.php?cod='.$p[$i][0].'" class="btn btn-danger" >Supprimer</a></div></td>';
                                echo '</tr>';
                            } 
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <script src="js/ajYN.js"></script>
    
    
</html>