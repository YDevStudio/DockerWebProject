<?php
session_start();
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../classes/connectionClass/userRun.php");
require_once("../classes/assistClass/assist.class.php");

if (isset($_POST['btnS'], $_POST['email'], $_POST['password'])) {

   $email = $_POST['email'];
   $password = $_POST['password'];
   $ur = new UserRun();
   if ($id = $ur->conectUser($email, $password)[0]) {
      $c = assist::coder($email, $id);
      $co = "steC";
      setcookie($co, $c, time() + (86400 * 60), '/');
      $_COOKIE['steC'] = $c;
      $_SESSION['steS'] = $c;
      header("location:../../");
   } else {
      header("location:../../public/Pages/connect.php?err");
   }
} else
   echo 'error';
   ob_end_flush();
?>