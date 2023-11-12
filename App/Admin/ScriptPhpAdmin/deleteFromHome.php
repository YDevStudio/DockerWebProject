<?php 
require_once("../../classes/connectionClass/ProdectRun.php");
if (isset($_POST['idpp'])) {
                $id=$_POST['idpp'];
                $pr= new ProdectRun();
                $pr->deleteFromHome($id);
                    
              

}else{
    header('location:../admin/carousel.php');
}