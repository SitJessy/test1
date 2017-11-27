<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
  ini_set('default_charset',"windows-1252");
  include("Parametres.php");

  $NomDuGroupe = $_GET['NomDuGroupe'];
  $destination = $_GET['destination'];
  $transport = $_GET['transport'];
  $NombredePersonnes = $_GET['NombredePersonnes'];





  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base)
  or die("Impossible de s�lectionner la base : $base");

  /*$resultat = mysqli_query($id,"SELECT prix
                              FROM PRIX
                              WHERE Destination='$destination'
                                 AND transport='$transport';");
  $prix = $unite*$NombredePersonnes */

  $resultat=mysqli_query($id, "SELECT * 
                         FROM RESULTAT
                         WHERE NomDuGroupe='$NomDuGroupe'
                           AND Destination='$destination'
                           AND transport='$transport';");

  if(@mysqli_num_rows($resultat)>0)
    { // modification de la note
      $resultat=mysqli_query($id, "UPDATE RESULTAT 
	                     set NombreDePersonnes=$NombredePersonnes  
                       	     WHERE NomDuGroupe='$NomDuGroupe' 
	                            AND Destination='$destination'
	                            AND transport='$transport';");

	                       
      //echo "Modification de la note de $eleve en $matiere : $note<BR>\n"; 	                       
		$msg="Modification du nombre de Personnes du groupe $NomDuGroupe voyageant en $transport par $NombredePersonnes Personnes";
		 header("Location:index.php?msg=$msg");
   		 exit;


    }
  else
    { // 1er enregistrement de la note pour ces matiere et eleve
      $resultat=mysqli_query($id, "INSERT INTO RESULTAT (`NomDuGroupe`, `NombreDePersonnes`, `transport`,`destination`,`prix`)
                             VALUES ('$NomDuGroupe', '$NombredePersonnes', '$transport', '$destination');");
							 /*echo "INSERT INTO RESULTAT (`eleve`, `matiere`, `note`)
                             VALUES ('$eleve', '$matiere', '$note')";
      echo "Enregistrement de la note de $eleve en $matiere : $note<BR>\n"; */

	  $msg=" Le groupe $NomDuGroupe composé de $NombredePersonnes personnes pour le voyage à $destination en $transport a bien été enregistrer";
	  header("Location:index.php?msg=$msg");

   	  exit;


	

    }

?>