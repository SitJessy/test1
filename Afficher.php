<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
  ini_set('default_charset',"windows-1252");
  include("Parametres.php");

  $ListeMatieres = $_GET['ListeMatieres'];
  $ListeEleves = $_GET['ListeEleves'];
  $tri = $_GET['tri'];

  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base) or die("Impossible de s�lectionner la base : $base");

  // Traitement des param�tres 
  // Les mati�res et les �l�ves s�lectionn�s sont respectivement r�cupur�s
  // dans les tableaux  $ListeMatieres et $ListeEleves
  $NbMatieres=sizeof($ListeMatieres);
  if($NbMatieres==0) echo "Vous devez s�lectionner au moins une mati�re<BR>\n";
  
  $NbEleves  =sizeof($ListeEleves);
  if($NbEleves==0) echo "Vous devez s�lectionner au moins un �l�ve<BR>\n";

  echo"<BODY BGCOLOR=\"white\"   background=\"./images/bgVACANCES.jpg\" style=\"font-size:100%;color:black;style=\"width: 50px"\">";


  if(($NbMatieres>0)&&($NbEleves>0))
    { 
      // construction de la requ�te avec la 1�re mati�re s�lectionn�e
      $requete="SELECT * FROM RESULTAT WHERE ( matiere='$ListeMatieres[0]'";
      
      // ajout de toutes les autres mati�res s�lectionn�es
      for($i=1;$i<$NbMatieres;$i++)
        { $requete.=" OR matiere='$ListeMatieres[$i]'";
        }
        
      // ajout du 1er �l�ve s�lectionn�
      $requete.=") AND ( eleve='$ListeEleves[0]'";
      
        // ajout de toutes les autres mati�res s�lectionn�es
      for($i=1;$i<$NbEleves;$i++)
        { $requete.=" OR eleve='$ListeEleves[$i]'";
        }
        
      // ajout de l'�l�ment de tri
      $requete.=") ORDER BY `$tri` ASC;";
      
      // lancement de la requ�te,  
      $resultat=mysqli_query($id, "$requete");
      
      echo "<TABLE BORDER=1> 
            <TR><TH>&Eacute;l�ve</TH><TH>Mati�re</TH><TH>Note</TH></TR>\n";
      for($i=0;$i<mysqli_num_rows($resultat);$i++) {
          $ligne = mysqli_fetch_assoc($resultat);
          $eleve  = $ligne["eleve"];
       	  $matiere= $ligne["matiere"];
          $note   = $ligne["note"];;
        
          echo "<TR><TD>$eleve</TD><TD>$matiere</TD><TD>$note</TD></TR>\n";
        }
      echo "</TABLE>\n";
    }  

?>