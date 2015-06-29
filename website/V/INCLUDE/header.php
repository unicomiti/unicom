<!--
header.php
-->
<head>
	<meta charset="utf-8">
	<title>Unicom - Communication unifiée</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="./V/INCLUDE/CSS/bootstrap.css" media="screen">
	<link rel="stylesheet" href="./V/INCLUDE/CSS/assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="./V/INCLUDE/CSS/Font-Awesome/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
	<script src="../bower_components/respond/dest/respond.min.js"></script>
	<![endif]-->
<?php
if (isset($_SESSION['ID']))
	{
	// SI CONNECTER
		echo ("<link href = './V/INCLUDE/CSS/unicom_private.css' rel='stylesheet'>");
	}
	else
	{
	// SI DECONNECTER
		//echo ("<link href = 'http://getbootstrap.com/examples/cover/cover.css' rel='stylesheet'>");
		echo ("<link href = './V/INCLUDE/CSS/unicom_public.css' rel='stylesheet'>");
	}
?>
    

</head>