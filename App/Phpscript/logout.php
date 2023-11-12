<?php
  ### scripte pour deconnection	
  session_start();
  session_destroy();
  $co="steC";
  unset($_COOKIE['steC']);
  setcookie($co, null, -1,'/');
  header("location:../../");

?>