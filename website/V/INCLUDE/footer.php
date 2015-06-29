<!--
footer.php
-->

<footer>
	<?php
	if (isset($_SESSION['ID']))
	{
	// SI CONNECTER
		include_once ("./V/V_jappix.php");
	}
	else
	{
	// SI DECONNECTER
		echo "
		<div class = \"cover-container\">
		<div class=\"mastfoot\">
		<div class=\"inner\">
		<p>
		Réalisé par l'équipe Unicom à l'aide de <a href=\"http://getbootstrap.com/\">Bootstrap</a>.
		</p>
		
		<p>
		<a href = \"#\"> Contact | </a>
		<a href = \"#\"> Licences | </a>
		<a href = \"#\"> GitHub </a>
		</p>

		</div>
		</div>
		</div>";
	}
	?>

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="./V/INCLUDE/CSS/BOOTSTRAP/js/bootstrap.min.js"></script>
	<!--<script src="./V/INCLUDE/CSS/assets/js/bootswatch.js"></script>-->
	
</footer>

