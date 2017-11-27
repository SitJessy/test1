<HTML>
<head>
    <title>Hello, Jessy!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="./Degrade.css">

</head>

<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
  ini_set('default_charset',"windows-1252");
  include("Initialiser.php");

  // Chargement des destinations dans un tableau
  $resultat=mysqli_query($id, "SELECT * FROM DESTINATION;");
  $nb_destinations=mysqli_num_rows($resultat);
  for($i=0;$i<$nb_destinations;$i++)
    {
        $ligne_destination = mysqli_fetch_assoc($resultat);
        $destinations[$i]= $ligne_destination["lieu"];
    }

  // Chargement des transports dans un tableau
  $resultat=mysqli_query($id, "SELECT * FROM TRANSPORT;");
  $nb_transports=mysqli_num_rows($resultat);
  for($i=0;$i<$nb_transports;$i++) {
      $ligne_transport = mysqli_fetch_assoc($resultat);
      $transports[$i]= $ligne_transport["typetransport"];
  }

?>


<BODY BGCOLOR="white"   <!--background="./images/bgVACANCES.jpg" class="img-fluid" alt="Responsive image" --> <BR>
<div class="Degrade">


	<H1 align="CENTER">Gestion des voyages d'écoles avec Prix</H1>
	

	<!-- <H2>Fonctionnalites d'acces</H2> -->
    <BR>
    <BR>


	<?php
		//if($msg!="") echo""
	?>

	<!-- 1ere ligne -->
	
	<FORM METHOD="GET" TARGET="Resultat" ACTION="ReInitialiser.php">
	<TABLE WIDTH="640" BORDER="0" ALIGN="CENTER">
	<TR><TD>
		<TABLE BORDER="0">
		<TR>
		    <!--<TD WIDTH="170" ALIGN="CENTER">&nbsp;</TD>
		    <TD WIDTH="230" ALIGN="CENTER">&nbsp;</TD>
		    <TD WIDTH="120" ALIGN="CENTER">&nbsp;</TD> -->
		    <TD WIDTH="640" ALIGN="CENTER">
		        <!-- <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="  Initialiser  "> -->
                <input type="submit" class="btn btn-success btn btn-primary btn-lg btn-block" value="Initialiser"</input>
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>


	
	<!-- 2eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Enregistrer.php">
	<TABLE WIDTH="1000" BORDER="1" align="CENTER">
	<TR><TD>
		<TABLE BORDER="0">
		<TR>
            <TD WIDTH="190" align="LEFT">
                Nom du groupe : <INPUT TYPE="TEXT" SIZE="7" MAXLENGTH="10" NAME="NomDuGroupe">
            </TD>

		    <TD WIDTH="200" ALIGN="LEFT">
		    	Destination :
		    	<SELECT  class="custom-select btn-secondary btn-sm" NAME="destination" size="1">

                <?php
                    foreach($destinations as $destination)
                    { echo "\t\t\t<OPTION>$destination</OPTION>\n";
                    }
                ?>


			</SELECT>
		    </TD>
		    <TD WIDTH="170" ALIGN="RIGHT">
		    	Transport :
		    	<SELECT class="custom-select btn-secondary btn-sm" NAME="transport" size="1">

                <?php
                    foreach($transports as $transport)
                    { echo "\t\t\t<OPTION>$transport</OPTION>\n";
                     }
                ?>

			</SELECT>
            </TD>
            <TD WIDTH="210" ALIGN="RIGHT">
                Nombre de Personnes :
                <INPUT TYPE="INT" SIZE="3"  MAXLENGTH="5" NAME="NombredePersonnes">

            </TD>
		    
		    <TD WIDTH="190" ALIGN="RIGHT">
		        <!-- <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Enregistrer"> -->
                <input type="submit" value="Enregistrer" class="btn btn-outline-dark btn-secondary btn-sm"</input>
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>
		


        <!-- 3eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Supprimer.php">
	<TABLE WIDTH="1000" BORDER="1" ALIGN="CENTER">
	<TR><TD>
            <!-- // Supression du groupe entier -->

		<TABLE BORDER="0">
		<TR>
            <TD WIDTH="190" align="LEFT">
                Nom du groupe : <INPUT TYPE="TEXT" SIZE="7" MAXLENGTH="10" NAME="age">
            </TD>
		    <TD WIDTH="200" ALIGN="LEFT">
		    	Destination :
		    	<SELECT class="custom-select btn-secondary btn-sm" NAME="destination" size="1">
				
<?php				
  foreach($destinations as $destination) 
    { echo "\t\t\t<OPTION>$destination</OPTION>\n";
    }
?>

			</SELECT>
		    </TD>
		    <TD WIDTH="170" ALIGN="RIGHT">
		    	Transport :
		    	<SELECT class="custom-select btn-secondary btn-sm" NAME="transport" size="1">

				
<?php				
  foreach($transports as $transport) 
    { echo "\t\t\t<OPTION>$transport</OPTION>\n";
    }
?>
		
			</SELECT>
		    </TD>
		    <TD WIDTH="120" ALIGN="CENTER">		    
		        &nbsp;	
		    </TD>
		    
		    <TD WIDTH="280" ALIGN="RIGHT">
		       <!-- <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Supprimer"> -->
                <input type="submit" value="supprimer" class="btn btn-outline-danger btn-secondary btn-sm"</input>
		    </TD>
		</TR>
		</TABLE> <!-- Supression de personnes dans le groupe -->
	</TD></TR>
    <TD>
        <TABLE BORDER="0">
            <TR>
            <TD WIDTH="190" align="LEFT">
                Nom du groupe : <INPUT TYPE="TEXT" SIZE="7" MAXLENGTH="10" NAME="age">
            </TD>
            <TD WIDTH="200" ALIGN="LEFT">
                Destination :
                <SELECT class="custom-select btn-secondary btn-sm" NAME="destination" size="1">

                    <?php
                    foreach($destinations as $destination)
                    { echo "\t\t\t<OPTION>$destination</OPTION>\n";
                    }
                    ?>

                </SELECT>
            </TD>
            <TD WIDTH="170" ALIGN="RIGHT">
                Transport :
                <SELECT class="custom-select btn-secondary btn-sm" NAME="transport" size="1">


                    <?php
                    foreach($transports as $transport)
                    { echo "\t\t\t<OPTION>$transport</OPTION>\n";
                    }
                    ?>

                </SELECT>
            </TD>
                <TD WIDTH="210" ALIGN="RIGHT">
                    Nombre de Personnes :
                    <INPUT TYPE="INT" SIZE="3"  MAXLENGTH="5" NAME="Nombre de Personnes">

                </TD>

            <TD WIDTH="190" ALIGN="RIGHT">
                <!--<INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Supprimer">
                <input class="btn btn-primary" type="submit" value="Submit"> -->
                <input type="submit" value="supprimer" class="btn btn-outline-danger btn-secondary btn-sm"</input>
                <!-- Utilisation de Bootstrap -->


            </TD>
            </TR>
        </TABLE>


    </TD>
	</TABLE>	
	</FORM>	
		                            
			
	<!-- 4eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Afficher.php">
	<TABLE WIDTH="840" BORDER="1" ALIGN="CENTER">
	<TR><TD>
		<TABLE BORDER="1">
		<TR>
		    <TD WIDTH="100" VALIGN="TOP "ALIGN="LEFT">
		    	Destination:
		    </TD>
		    <TD WIDTH="130">


<?php				
  foreach($destinations as $destination) 
    { echo "<INPUT TYPE=\"CHECKBOX\" NAME=\"Listedestinations[]\" VALUE=\"$destination\">$destination<BR>\n";


    }
?>

			
		    </TD>
		    <TD WIDTH="100" ALIGN="CENTER">
		    	Locomotion:
		    </TD>
		    <TD WIDTH="150" ALIGN="LEFT">
		    	
<?php				
  foreach($transports as $transport) 
    { echo "<INPUT TYPE=\"CHECKBOX\" NAME=\"Listetransports[]\" VALUE=\"$transport\">$transport<BR>\n";
    }
?>
	
		    </TD>
		    <TD WIDTH="180"  ALIGN="LEFT"> Trie par :

                <BR><BR>
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input name ="tri" type="radio" value="transport"> Transport
                    </span>
                    </div>
                </div>
                </>
                <BR>
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input name ="tri" type="radio" value="destination"> Destination
                    </span>
                    </div>
                </div>


		       <!-- <INPUT NAME="tri" TYPE="RADIO" VALUE="destination"    CHECKED>Destination<BR>
           		<INPUT NAME="tri" TYPE="RADIO" VALUE="transport"         >Transport -->
		    </TD>
		    
		    <TD WIDTH="210" VALIGN="MIDDLE" ALIGN="CENTER">
		       <!-- <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Afficher"> -->
                <input type="SUBMIT" class="btn btn-outline-info btn-secondary btn-sm" value="  Afficher  "</input>
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>

</div>
</BODY>
</HTML>
