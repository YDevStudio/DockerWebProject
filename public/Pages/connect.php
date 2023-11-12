<?php 
    	session_start();
    require_once("../../App/classes/connectionClass/StatisticsRun.php");
    $pro=new StatisticsRun();
    $pro->incX(4);
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
        header("location:../../");
   }
?>

<!doctype html>
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
               <div>
                   <a href="../../index.php"><img class="img-fluid center" src="../image/LOGO.png"  ></a>  
               </div>
            </div>
        </header>
        <div class="center_login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php 
                        if(isset($_GET['err']))
                          echo '<div class="alert alert-danger" role="alert">Mot de passe ou Email est incorrect !</div>';
                        ?>
                        <?php 
                        if(isset($_GET['success']))
                          echo '<div class="alert alert-success" role="alert">Votre compte a été bien créer</div>';
                        ?>   
                        <div class="back_login">
                            <h2>Déja client ?</h2>
                            <h5><i><small>Connectez-vous</small></i></h5>
                            <form action="../../App/Phpscript/Login.php" method="post">
                            <label>Email <span class="requis"> *</span></label>
                            <input type="text" class="form-control"  name="email" required>
                            
                            <label>Mot de passe <span class="requis"> *</span></label>
                            <input type="password" name="password" class="form-control" required>
                            
                            <input type="submit" name="btnS" class="btn btn-success" value=" Me connecter" style="margin-top:20px;"> 
                           
                                <h5><i><small class="float-right" style="font-size: 14px; color: red; margin-right: 40px;" >* Chams requis</small></i></h5>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="back_login" style="height: 100%;">
                            <div class="back_sign">
                                <h2>Créer un nouveau compte</h2>
                                <h5><i><small>Inscrivez-vous</small></i></h5>
                                <a href="inscrire.php" class="btn btn-success"><i class="fa fa-arrow-right"></i> Créer</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="../../index.php" ><strong><i class="fa fa-arrow-left" style="margin-top: 40px; text-decoration: none; color: #000;"></i> <span style="color: #000;">Retour à la page précédente</span></strong></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    
    <script src="../js/ijs.js"></script>
    
</html>