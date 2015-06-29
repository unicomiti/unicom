<?php
// LOGIN
if (isset ($_POST['login'])
	AND isset($_POST['nickname_login_input'])
	AND isset($_POST['password_login_input'])){

	$user->connect ($_POST['nickname_login_input'], $_POST['password_login_input']);
header("Location: ./index.php");

} else {
// Nothing
}
?>		
<?php 	include_once ("./V/V_public.php"); /* Inclusion de la vue*/?>
