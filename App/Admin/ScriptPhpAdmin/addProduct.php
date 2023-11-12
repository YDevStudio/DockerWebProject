
<?php 
require_once("../../classes/connectionClass/ProdectRun.php");
if (isset($_POST['btnS'])) {
  
    $data=[$_POST['pname'],$_POST['ptype'],$_POST['l'],$_POST['h'],$_POST['w'],$_POST['cat'],$_POST['price'],$_POST['sto'],$_POST['desc']];

    
     
    //img1
    $file1 = $_FILES['i1'];
    $fileName1 = $_FILES['i1']['name'];
    $fileTmpName1 = $_FILES['i1']['tmp_name'];
    $fileSize1 = $_FILES['i1']['size'];
    $fileError1 = $_FILES['i1']['error'];
    $fileType1 = $_FILES['i1']['type'];    
    $fileExt1 = explode('.', $fileName1);
    $fileActualExt1 = strtolower(end($fileExt1));

    //img2
    $file2 = $_FILES['i2'];
    $fileName2 = $_FILES['i2']['name'];
    $fileTmpName2 = $_FILES['i2']['tmp_name'];
    $fileSize2 = $_FILES['i2']['size'];
    $fileError2 = $_FILES['i2']['error'];
    $fileType2 = $_FILES['i2']['type'];
    $fileExt2 = explode('.', $fileName2);
    $fileActualExt2 = strtolower(end($fileExt2));

    //img3
    $file3 = $_FILES['i3'];
    $fileName3 = $_FILES['i3']['name'];
    $fileTmpName3 = $_FILES['i3']['tmp_name'];
    $fileSize3 = $_FILES['i3']['size'];
    $fileError3 = $_FILES['i3']['error'];
    $fileType3 = $_FILES['i3']['type'];
    $fileExt3 = explode('.', $fileName3);
    $fileActualExt3 = strtolower(end($fileExt3));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt1, $allowed) and in_array($fileActualExt2, $allowed) and in_array($fileActualExt3, $allowed) ) {
        if ($fileError1 === 0 and $fileError2 === 0 and $fileError3 === 0) {
            if ($fileSize1 < 1000000 and $fileSize2 < 1000000 and $fileSize3 < 1000000) {
                
                $fileNameNew1 = uniqid('', true) . "." . $fileActualExt1;
                $fileDestination1 = '../../../public/pimg/' . $fileNameNew1;
                move_uploaded_file($fileTmpName1, $fileDestination1);
                
                $fileNameNew2 = uniqid('', true) . "." . $fileActualExt2;
                $fileDestination2 = '../../../public/pimg/' . $fileNameNew2;
                move_uploaded_file($fileTmpName2, $fileDestination2);
                
                $fileNameNew3 = uniqid('', true) . "." . $fileActualExt3;
                $fileDestination3 = '../../../public/pimg/' . $fileNameNew3;
                move_uploaded_file($fileTmpName3, $fileDestination3);
                
                $imgs =[$fileNameNew1,$fileNameNew2,$fileNameNew3];
                $p =new Prodect($data);
                $pr= new ProdectRun();
                $pr->addProdect($p,$imgs);
                    
                header('location:../admin/product.php');
            } else {
                echo 'your file is biig';
            }
        } else {
            echo "tehre was error during uploding your image";
        }
    } else {
        echo "you cannot uplod file of this type!";
    }

}
