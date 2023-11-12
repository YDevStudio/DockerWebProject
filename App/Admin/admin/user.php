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
       require_once('../../classes/connectionClass/userRun.php');
       $ur = new UserRun();
       $users = $ur->getAllUsers();
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
                        <a href="user.php"><li class="list-group-item active"><i class="fa fa-user"></i> Utilisateur</li></a>
                        <a data-toggle="collapse" data-target="#ProductCollapse" href="#"><li class="list-group-item"><i class="fas fa-dice-d6 " ></i>  Produits</li></a>
                        <li class="list-group-item collapse" id="ProductCollapse">
                                <ul>
                                    <li><a href="product.php"> Afficher</a></li>
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
                        <h3>Utilisateur</h3>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table" >
                                <tr>
                                    <th>ID</th>
                                    <th>Genre</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>

                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>email</th>
                                    <th>Téléphone</th>
                                    <th>Date d'inscription</th>
                                    <th></th>
                                </tr>
                <?php         
                            for( $i=0 ; $i < count($users) ; $i++){    
                                echo '<tr>';
                                    echo '<td>U'.(intval($users[$i][0])+113)*3 .'</td>';
                                    echo '<td>'.$users[$i][4].'</td>';
                                    echo '<td>'.$users[$i][2].'</td>';
                                    echo '<td>'.$users[$i][1].'</td>';
                                    echo '<td>'.$users[$i][7].'</td>';
                                    echo '<td>'.$users[$i][8].'</td>';
                                    echo '<td>'.$users[$i][6].'</td>';
                                    echo '<td>'.$users[$i][5].'</td>';
                                    echo '<td>'.$users[$i][10].'</td>';
                                    echo '<td><div class="d-flex"><a href="../ScriptPhpAdmin/deleteUser.php?cod='.$users[$i][0].'" class="btn btn-danger" >Supprimer</a>
                                    <a href="userdetail.php?idu='.$users[$i][0].'" class="btn btn-info" style="margin:0 2px;">Voir</a></td>';
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
    
    
    
</html>