<?php 
require_once("../../classes/connectionClass/ProdectRun.php");
if (isset($_POST['btnS'],$_POST['idpp'])) {
                $id=$_POST['idpp'];
                $id=substr($id,2); 
                $id=(intval($id)-173)/3;
                $pr= new ProdectRun();
                $pr->setInHome($id);
                    
                header('location:../admin/carousel.php');

}else{
    header('location:../admin/carousel.php');
}