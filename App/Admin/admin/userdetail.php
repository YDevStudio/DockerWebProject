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
       if(isset($_GET['idu'])){
       require_once('../../classes/connectionClass/userRun.php');
       $ur = new UserRun();
       $user = $ur->getUserById($_GET['idu']);}
       else
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
                <a href="home.php"><img class="mx-auto d-block" src="image/lOGO.png" ></a>
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
                        <a data-toggle="collapse" data-target="#DemandeCollapse" href="#"><li class="list-group-item"><i class=" fas fa-shopping-cart "></i> Commande</li></a>
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
                        
                        <h3> <?php echo $user[1].' '.$user[2]  ?></h3>
                        <div class="row">
                           <div class="col-lg-6" >   
                                <label>Date de naissance </label>
                                <input type="date" class="form-control" value="<?php echo $user[3];?>" disabled>
                            </div>
                             <div class="col-lg-6" >   
                                <label>Date d'inscription </label>
                                <input type="date" class="form-control" value="<?php echo $user[10];?>" disabled>
                            </div>

                            <div class="col-lg-6">    
                                <label>Numéro de téléphone</label>
                                <input maxlength="10" type="tel" class="form-control" value="<?php echo $user[5];?>" disabled>
                                <span id="NtS"></span>
                            </div>

                            <div class="col-lg-6">    
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?php echo $user[6];?>" disabled>
                                <span id="ES"></span>
                            </div>


                            <div class="col-lg-6">   
                                <label>Ville</label>
                                <input type="text" class="form-control" value="<?php echo $user[8];?>" disabled>
                            </div>

                          

                            <div class="col-lg-12">       
                                <label>Mon adresse</label>
                                <input type="text" maxlength="100" class="form-control" value="<?php echo $user[7];?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    
    
</html>