<!--
C_logout.php
Controller for the log out function
Created by Max (2015-01-07)
-->

<?php
	if (!isset($_SESSION)) { session_start(); }
?>

<?php
	include("./../M/M_logout.php");				// Including the Model

	// Suppression des variables de session et de la session
	logout();
	//Et on recharge l'index
	header("Location: ./../index.php");

	include("./../V/V_logout.php");		// Including the View
?>
