<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>
<?php

// CLASS DB_Meetspace: Gére la connection à la base de données de Meetspace

class DB {

    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PROTECTED  ATTRIBUT
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    protected $unicom_db;
    protected $prosody_database;
    protected $request;

    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PROTECTED  FUNCTION
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    protected function log_prosody_database () {		// Connexion à la base de données de Prosody
        try {
            $this->prosody_database = new PDO('mysql:host=localhost;dbname=prosody', 'unicom', 'unicom');
        } catch (Exception $e) {
            die("Error : ".$e->getMessage());
        }
    }

    protected function log_meetspace_database () {		// CONNEXION À LA BASE DE DONNÉES
        try {
            $this->unicom_db = new PDO('mysql:host=localhost;dbname=unicom', 'unicom', 'unicom');
        } catch (Exception $e) {
            die("Error : ".$e->getMessage());
        }
    }

    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    #PUBLIC FUNCTION - CONSTRUCTEUR
    #------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function __construct(){}

    //DESTRUCTEUR
    public function __meetspace_DBdestruct()
    {
    }
}