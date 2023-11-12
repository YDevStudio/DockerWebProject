
<?php 
require_once("../../classes/connectionClass/ProdectRun.php");
if (isset($_POST['btnS'])) {
  
    $data=[$_POST['pname'],$_POST['ptype'],$_POST['l'],$_POST['h'],$_POST['w'],$_POST['cat'],$_POST['price'],$_POST['sto'],$_POST['desc']];
    $id=$_GET['cod'];
    
     
   
                $p =new Prodect($data);
                $pr= new ProdectRun();
                $pr->editProdect($p,$id);
                    
                header('location:../admin/product.php');

}
