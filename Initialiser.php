<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
  include("Parametres.php");

  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base) or include("Setup.php");

?>