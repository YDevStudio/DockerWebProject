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
                        <li class="list-group-item " id="ProductCollapse">
                                <ul>
                                    <li><a href="product.php"> Afficher</a></li>
                                    <li class="actived"><a href="productadd.php"> Ajouter</a></li>
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
                        <h3>Ajouter un produit</h3>
                        <div class="productadd">
                            <form method="post" action="../ScriptPhpAdmin/addProduct.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nom: </label>
                                        <input type="text" name="pname" required class="form-control" placeholder="Nom du produit">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Type: </label>
                                        <input type="text" name="ptype" required class="form-control" placeholder="Type de porduit">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Longueur: </label>
                                        <input type="number" name="l" step="0.01" required class="form-control" placeholder="Longueur">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Largeur: </label>
                                        <input type="number" name="w" step="0.01" required class="form-control" placeholder="Largeur">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Hauteur: </label>
                                        <input type="number" name="h" step="0.01" required class="form-control" placeholder="Hauteur">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Catégorie: </label>
                                        <select class="form-control" name="cat">
                                            <option value="CABLE" selected>CABLE</option>
                                            <option value="BASE">BASE</option>
                                            <option value="PAUTEAUX">PAUTEAUX</option>
                                            <option value="AUTRE">AUTRE</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Dans stock: </label>
                                        <select class="form-control" name="sto" >
                                            <option value="1" selected>Oui</option>
                                            <option value="0">Non</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Prix: </label>
                                        <input type="number" name="price" required class="form-control" placeholder="Prix">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Description :</label>
                                        <textarea class="form-control" name="desc" required placeholder="Description du produit" ></textarea>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Image Principale:</label>
                                        <input type="file" name="i1" required class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Image 2:</label>
                                        <input type="file" name="i2" required class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Image 3:</label>
                                        <input type="file" name="i3" required class="form-control">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" name="btnS" class="btn btn-success float-right" value="Ajouter">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
    
    
    
</html>