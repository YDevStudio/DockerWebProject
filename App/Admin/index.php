<?php 
    	session_start();

    require_once("../classes/assistClass/assist.class.php");
    $conect =false;
    if(isset($_SESSION['steSA']) and $_SESSION['steSA'] === assist::getCode()){
        $conect =true;
    }else{
        $conect =false;
    }        
   if($conect){
        header("location:admin/home.php");
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
        
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        
        <link rel="stylesheet" href="admin/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        

    </head>
    
    <body>
        <header>
            <div class="container">
                <img class="mx-auto d-block" src="admin/image/LOGO.png" >
            </div>
        </header>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="login-img">
                                <img src="admin/image/user.png">
                            </div>
                            <div class="login-title">
                                <h4>Se connecter</h4>
                            </div>
                            <div class="login-form mt-4">
                                <?php 
                                    if(isset($_GET['err']))
                                        echo '<div class="alert alert-danger" role="alert">Mot de passe ou user est incorrect !</div>';
                                ?>
                                <form method="post" action="ScriptPhpAdmin/logInAdmin.php">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input name="userA" placeholder="User" class="form-control" type="text">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input name="passA" type="password" class="form-control" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <input type="submit" class="btn btn-success btn-block" name="btnS" value="Se connecter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</html>