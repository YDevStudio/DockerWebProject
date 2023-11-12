<?php 
    	session_start();
    require_once("../../App/classes/connectionClass/StatisticsRun.php");
    $pro=new StatisticsRun();
    $pro->incX(9);

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
        
        <link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="../css/signInStyle.css" type="text/css">
		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        

    </head>
    
    <body>
        <header>
           <div class="container">
               <div>
                   <a href="../../index.php"><img class="img-fluid center" src="../image/LOGO.png"  ></a>  
               </div>
            </div>
        </header>
        
        <div class="container back_inscrit_one">
            <h4>CRÉEZ VOTRE COMPTE UTILISATEUR </h4>
            <div class="back_inscrit">
                <h3>Veuillez renseigner vos informations dans les champs ci-dessous :</h3>
                <form action="../../App/Phpscript/signup.php" method="POST">
                    
                            
                    <div class="row">
                        <div class="col-lg-6" >   
                           <label>Civilité</label><br>
							 <input type="radio" name="gender" value="M" checked> Mr. <span> </span>
                    		 <input type="radio" name="gender" value="F" style="margin-bottom: 20px;"> Mme.
                        </div>
                        
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6" id="FnD">
                            <label>Prénom <span class="requis">*</span></label>
                            <input type="text" id="FnI" maxlength="30" name="fn" class="form-control">
                            
                        </div>
                        
                        <div class="col-lg-6" id="LnD">
                            <label>Nom <span class="requis">*</span></label>
                            <input type="text" maxlength="30" id="LnI" name="ln" class="form-control">
                        </div>
                        
		               <div class="col-lg-6" id="DD">   
                            <label>Date de naissance </label>
                            <input type="date" id="DI" name="bd" class="form-control">
                        </div>
                         
                        <div class="col-lg-6" id="NtD">    
                            <label>Numéro de téléphone <span class="requis">*</span></label>
                            <input id="NtI" maxlength="10" type="tel" name="tel" class="form-control">
							<span id="NtS"></span>
                        </div>
                        
                        <div class="col-lg-6" id="ED">    
                            <label>Email <span class="requis">*</span></label>
                            <input type="email" id="EI" name="email" class="form-control">
							<span id="ES"></span>
                        </div>
                        
                        
						<div class="col-lg-6">   
                            <label>Ville <span class="requis">*</span></label>
                            <select class="form-control" name="city">
                                <option>BERKANE</option>
                                <option>NADOR</option>
                            </select>
                        </div>
						
					   <div class="col-lg-12" id="AD">       
                            <label>Mon adresse <span class="requis">*</span></label>
                            <input type="text" id="AI" name="address" maxlength="100" class="form-control">
                        </div>
                                                
                        <div class="col-lg-6" id="PD">   
                            <label>Mot de passe <span class="requis">*</span></label>
                            <input type="password" name="password" id="PI" maxlength="30" class="form-control">
							<span id="PS"></span>
                        </div>
                        
                        <div class="col-lg-6" id="PcD">   
                            <label>Confirmer le mot de passe <span class="requis">*</span></label>
                            <input type="password" id="PcI" maxlength="30" name="psc" class="form-control">
							<span id="PcS"></span>
                        </div>
                       
                        
                        <div class="col-lg-12" style="margin: 30px 0;" id="CD">                            
                             <input type="checkbox" id="CI"><span id="CS"> J'ai lu et j'accepte les conditions générales d'utilisation du site notamment la mention relative à la protection des données personnelles.</span>
                        </div>
						
                        <div class="col-lg-10 center">
                            <div class="progress " style="margin-bottom: 20px;">
								<div class="progress-bar progress-bar-animated" style="width:10%">10%</div><br>
						</div>
                        </div>
                        
						
                        <div class="col-lg-12">
                            <input type="submit" id="btnV" name="btnS" class="btn btn-success" value="Créer mon compte" disabled>
                        </div>
                        <div class="col-lg-12">
                            <h5><i><small class="float-right" style="font-size: 14px; color: red; margin-right: 40px;" >* Chams requis</small></i></h5>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12" >
                <a href="connect.php" ><strong><i class="fa fa-arrow-left" style="margin-top: 40px; text-decoration: none;      color: #000;"></i> <span style="color: #000;">Revenir</span></strong></a>
            </div>
        </div>
		
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    	<script src="../js/owl.carousel.min.js"></script><!-- ach kadir hada hna-->
		<script src="../js/injq.js"></script>
    
</html>