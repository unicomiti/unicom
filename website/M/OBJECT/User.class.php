<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>
<?php
// CLASS USER - Permet de gérer un utilisateur

class User extends  DB{
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PROTECTED  ATTRIBUT
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    protected $ID;
    protected $STATUS;
    protected $LASTNAME;
    protected $NICKNAME;
    protected $PASSWORD;
    protected $MAIL;
    protected $PHONENUMBER;

    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PUBLIC FUNCTION - CONSTRUCTEUR
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function __construct($memberID){
        // Définir les variables avec les résultats de la base

        //LOG DATABASE
        $this->log_meetspace_database ();
        $this->log_prosody_database ();
        $memberID = (int)$memberID;

        //var_dump($memberID);
        //var_dump($this);

        $ID = NULL;
        $STATUS = NULL;
        $LASTNAME = NULL;
        $NICKNAME = NULL;
        $PASSWORD = NULL;
        $MAIL = NULL;
        $PHONENUMBER = NULL;

        if (!isset($memberID) || $memberID == false) {
            //Non connecté
        }
        else{
            $this->request = $this->unicom_db->prepare ("SELECT `ID`, `STATUS`, `LASTNAME`, `NICKNAME`, `PASSWORD`, `MAIL`, `PHONENUMBER`, `CONTEXT_ID` FROM `USERS` WHERE `ID` = :id");
            $this->request->execute (array ('id' => $memberID));
            $this->resultat = $this->request->fetch();
            $this->ID = $this->resultat['ID'];
            $this->STATUS = $this->resultat['STATUS'];
            $this->LASTNAME = $this->resultat['LASTNAME'];
            $this->NICKNAME = $this->resultat['NICKNAME'];
            $this->PASSWORD = $this->resultat['PASSWORD'];
            $this->MAIL = $this->resultat['MAIL'];
            $this->PHONENUMBER = $this->resultat['PHONENUMBER'];
            $this->CONTEXT_ID = $this->resultat['CONTEXT_ID'];
            $this->request -> closeCursor();
        }
    }

    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PUBLIC FUNCTION - GET
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function get($var)
    {
        switch ($var) { // On renvoi la variable demandé
            case 'ID':
                $this->result=$this->ID;
                break;
            case 'STATUS':
                $this->result=$this->STATUS;
                break;
            case 'LASTNAME':
                $this->result=$this->MAIL;
                break;
            case 'NICKNAME':
                $this->result=$this->LASTNAME;
                break;
            case 'PASSWORD':
                $this->result=$this->PASSWORD;
                break;
            case 'MAIL':
                $this->result=$this->MAIL;
                break;
            case 'PHONENUMBER':
                $this->result=$this->PHONENUMBER;
                break;
            default:
                $this->result="UserClass:Mauvais nom de variable";
        }
        return ($this->result);
    }

    public function set($var)
    {
        switch ($var) { // On renvoi la variable demandé
            case 'ID':
                $this->result="UserClass: Modification de l'ID impossible";
                break;
            case 'STATUS':
                $this->request = $this->unicom_db->prepare ("UPDATE `users` SET `STATUS`=:var WHERE `USERS`.`ID`=:id;");
                $this->request -> execute (array (
                    'var' => $var,
                    'id' => $this->ID));
                //var_dump($description);
                $this->request -> closeCursor();
                $this->result="OK";
                break;
            case 'LASTNAME':
                $this->request = $this->unicom_db->prepare ("UPDATE `users` SET `LASTNAME`=:var WHERE `USERS`.`ID`=:id;");
                $this->request -> execute (array (
                    'var' => $var,
                    'id' => $this->ID));
                $this->request -> closeCursor();
                $this->result="OK";
                break;
            case 'NICKNAME':
                $this->request = $this->unicom_db->prepare ("UPDATE `users` SET `NICKNAME`=:var WHERE `USERS`.`ID`=:id;");
                $this->request -> execute (array (
                    'var' => $var,
                    'id' => $this->ID));
                $this->request -> closeCursor();
                $this->result="OK";
                break;
            case 'PASSWORD':
                $this->request = $this->unicom_db->prepare ("UPDATE `users` SET `PASSWORD`=:var WHERE `USERS`.`ID`=:id;");
                $this->request -> execute (array (
                    'var' => $var,
                    'id' => $this->ID));
                $this->request -> closeCursor();
                $this->result="OK";
                break;
            case 'MAIL':
                $this->request = $this->unicom_db->prepare ("UPDATE `users` SET `MAIL`=:var WHERE `USERS`.`ID`=:id;");
                $this->request -> execute (array (
                    'var' => $var,
                    'id' => $this->ID));
                $this->request -> closeCursor();
                $this->result="OK";
                break;
            case 'PHONENUMBER':
                $this->request = $this->unicom_db->prepare ("UPDATE `users` SET `PHONENUMBER`=:var WHERE `USERS`.`ID`=:id;");
                $this->request -> execute (array (
                    'var' => $var,
                    'id' => $this->ID));
                $this->request -> closeCursor();
                $this->result="OK";
                break;
            default:
                $this->result="UserClass: Mauvais nom de variable";
        }
        return ($this->result);
    }

    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PUBLIC FUNCTION - SET
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    /*public function setDESCRIPTION($description){
        $this->request = $this->unicom_db->prepare ("UPDATE `meetspace`.`USERS` SET `PROFILE_DESCRIPTION` = :description WHERE `USERS`.`ID`=:id;");
        $this->request -> execute (array (
            'description' => $description,
            'id' => $this->ID));
        //var_dump($description);
        $this->request -> closeCursor();
    }*/


    /*public function add_user (
        $nickname_signin_input,
        $mail_signin_input,
        $password_signin_input,
        $password_confirmation_input)
    {	// Signing in
        if ($password_signin_input === $password_confirmation_input)
        {
        // Checking if the password input and the confirmation input matches
            $this->request = $this->unicom_db->prepare ("INSERT INTO USERS (NICKNAME, PASSWORD, MAIL) VALUES(:nickname_signin_input, :password_signin_input, :mail_input)");
            $this->request -> execute (array (
                'nickname_signin_input' => $nickname_signin_input,
                'password_signin_input' => $password_signin_input,
                'mail_input' => $mail_signin_input));
            $this->request -> closeCursor();

            // AJOUT DE L'UTILISATEUR SUR LE SERVEUR
                // EN TANT QU'UTILISATEUR UNIX
            $output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userUnix.sh $nickname_signin_input $password_signin_input", $out);
            //var_dump ($out);
            //echo $output;

                // EN TANT QU'UTILISATEUR MAIL
            $output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userMail.sh $nickname_signin_input $password_signin_input", $out);
            //var_dump ($out);
            //echo $output;
                // EN TANT QU'UTILISATEUR CHAT
            $output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userChat.sh $nickname_signin_input $password_signin_input", $out);
            //var_dump ($out);
            //echo $output;

            echo ("Votre compte a bien été créé");
            //L'INSCRIPTION A FONCTIONNER: ON CONNECTE L'UTILISATEUR
            $this->connect($nickname_signin_input,$password_signin_input);

            //ENVOIE D'UN EMAL DE BIENVENU
            $destinataire = $nickname_signin_input.'@meetspace.itinet.fr';
            $expediteur   = "contact@meetspace.itinet.fr";
            $reponse      = $expediteur;

            mail($destinataire,
                "Bienvenue sur Meetspace",
                "L'équipe de Meetspace vous souhaite la bienvenue $nickname_signin_input sur son site.",
                "From: $expediteur\r\nReply-To: $reponse");

            echo ("Votre compte a bien été créé");

            echo ("Votre compte a bien été créé");

            //AJOUT D'UN PREMIER CONTACT PROSODY
            //INSERT INTO `prosody`(`host`, `user`, `store`, `key`, `type`, `value`) VALUES ('meetspace.itinet.fr','guillaume','roster','test@meetspace.itinet.fr','json','{"groups":{"Meetspace":true},"subscription":"both"}')​
            $this->request = $this->prosody_database -> prepare ("INSERT INTO `prosody`(`host`, `user`, `store`, `key`, `type`, `value`) VALUES ('meetspace.itinet.fr', :nickname_signin_input,'roster','pierrick@meetspace.itinet.fr','json','{'groups':{'Meetspace':true},'subscription':'both'}')​");
            $this->request -> execute (array (
                'nickname_signin_input' => $nickname_signin_input));
            $this->request -> closeCursor();

            $result=true;
        }
        else { echo ("Erreur : votre compte n'a pas pu être créé");$result=false;}
        return ($result);
    }*/

    public function connect($nickname_login_input, $password_login_input) {	// CONNEXION
        // Vérification des identifiants
        $req = $this->unicom_db->prepare('SELECT id FROM USERS WHERE NICKNAME = :pseudo AND PASSWORD = :pass');
        $req->execute(array(
            'pseudo' => $nickname_login_input,
            'pass' => $password_login_input));
        $resultat = $req->fetch();

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if (!isset($_SESSION)) { session_start(); }
            $_SESSION['ID'] = $resultat['id'];
            echo 'Vous êtes connecté !';
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}