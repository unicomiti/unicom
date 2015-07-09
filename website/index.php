<!-- Controller -->
<?php if (!isset($_SESSION)) {session_start();} //Démarrage de la session ?>
<?php include_once ("./M/OBJECT/User.class.php"); /* Inclusion de la class User */?>
<?php

if (isset($_SESSION['ID'])) // SI L'UTILISATEUR EST CONNECTE
{
    //S'il est connecté l'objet est initialiser grâce à son ID

    $user= new User($_SESSION['ID']);
    if ($user->get('STATUS')=='1') // ET SI ON EST ADMIN
    {
        include_once ("./C/C_admin.php"); // SI ON EST PAS CONNECTE ON TOMBE SUR LA PAGE D'ACCUEIL
    }
    else
    {
        include_once ("./C/C_perso.php"); // SI ON EST PAS CONNECTE ON TOMBE SUR LA PAGE D'ACCUEIL
        //var_dump($user->get('STATUS'));
    }
}
else
{
    #echo "Session Enabled but No Session values Created";
    $user = new User(FALSE);
    include_once ("./C/C_public.php"); // SI ON EST PAS CONNECTE ON TOMBE SUR LA PAGE D'ACCUEIL
}
?>

