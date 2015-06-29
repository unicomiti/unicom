	<?php
	try
	{
              // On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=unicom;charset=utf8', 'unicom', 'unicom');
	}
	catch(Exception $e)
	{
              // En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}

              // Si tout va bien, on peut continuer

              // On récupère tout le contenu de la table users
	$reponse = $bdd->query('SELECT * FROM users');

              // On affiche chaque entrée une à une
	?>
	
	
	<?php 	include_once ("./V/V_admin.php"); /* Inclusion de la vue*/?>
