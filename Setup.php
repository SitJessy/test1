<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

  include("Parametres.php");

  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass) or die("Impossible de se connecter au serveur : $host");

  // Suppression / Creation / Selection de la base de donn�es : $base
  $resultat=mysqli_query($id, "DROP DATABASE IF EXISTS $base");
  $resultat=mysqli_query($id, "CREATE DATABASE $base");
  mysqli_select_db($id, $base) or die("Impossible de selectionner la base : $base");


  // Creation de la table DESTINATION
  // Remarque : il est inutile de supprimer la table au prealable,
  //            la base de donnees venant juste d'etre creee
  //            [ mysqli_query($id, "DROP TABLE IF EXISTS DESTINATION;"); ]

  $resultat=mysqli_query($id, "CREATE TABLE DESTINATION 
                         (lieu char(40) NOT NULL default ''
	  	       ) ;");

  $resultat=mysqli_query($id, "CREATE TABLE PRIX
                          ( prix int(5) NOT NULL DEFAULT '0',
                            TRANSPORT char(20) NOT NULL DEFAULT,
                            DESTINATION char(40) NOT NULL DEFAULT,
                            PRIMARY KEY(TRANSPORT,DESTINATION)
                            );");

  // Insertions des destinations
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Epinal');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Strasbourg');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Colmar');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Toul');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Mulhouse');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Saint-Dizier');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Luneville');");
  $resultat=mysqli_query($id, "INSERT INTO DESTINATION VALUES ('Metz');");

  // Cr�ation de la table TRANSPORT
  $resultat=mysqli_query($id, "CREATE TABLE TRANSPORT
                         (typetransport char(20) NOT NULL default '',
     		              PRIMARY KEY  (typetransport) ) ;");

  // Insertions des types de transport
  $resultat=mysqli_query($id, "INSERT INTO TRANSPORT VALUES ('Train');");
  $resultat=mysqli_query($id, "INSERT INTO TRANSPORT VALUES ('Bus');");
 

  // Creation de la table PRIX
    $resultat=mysqli_query($id, "CREATE TABLE PRIX
                          (PRIX int(5) NOT NULL DEFAULT '0',
                            TRANSPORT char(20) NOT NULL DEFAULT,
                            DESTINATION char(40) NOT NULL DEFAULT,
                            PRIMARY KEY(TRANSPORT,DESTINATION)
                            );");

    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Epinal');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Strasbourg');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Colmar');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Toul');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Mulhouse');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Saint-Dizier');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Luneville');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)+10', 'Train','Metz');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Epinal');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Strasbourg');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Colmar');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Toul');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Mulhouse');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Saint-Dizier');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( 'Round(rand()*10)', 'Bus','Luneville');");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '4', 'Bus','Metz',18);");
    /*$resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '8', 'Train','Epinal',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '20', 'Train','Strasbourg',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '15', 'Train','Colmar',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '7', 'Train','Toul',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '17', 'Train','Mulhouse',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '15', 'Train','Saint-Dizier',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '12', 'Train','Luneville',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '8', 'Train','Metz',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '5', 'Bus','Epinal',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '14', 'Bus','Strasbourg',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '10', 'Bus','Colmar',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '5,5', 'Bus','Toul',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '13,75', 'Bus','Mulhouse',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '10', 'Bus','Saint-Dizier',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '10', 'Bus','Luneville',17);");
    $resultat=mysqli_query($id, "INSERT INTO PRIX VALUES ( '4', 'Bus','Metz',17);"); */



  // Creation de la table RESULTAT
  $resultat=mysqli_query($id,"CREATE TABLE RESULTAT 
                         (NomduGroupe char(20) NOT NULL DEFAULT,
                          NombreDePersonnes int(5) not NULL DEFAULT '0',
                          TRANSPORT   char(20) NOT NULL default,
    			          DESTINATION char(20) NOT NULL default,
    			          prix int(4) NOT NULL default'0',
  			              PRIMARY KEY  (NomduGroupe,TRANSPORT,DESTINATION)
		       ) ;");


