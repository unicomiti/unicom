<!-- Perso -->
<!DOCTYPE html>
<html lang="en">

<?php include_once ("./V/INCLUDE/header.php"); ?>

<body>
<?php include_once ("./V/INCLUDE/nav.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="bs-component">
                    <div class="jumbotron">
                        <h1>Unicom - Espace personnel</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header">
                                <h1 id="tables">Contacts</h1>
                            </div>

                            <div class="bs-component">
                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>NOM</th>
                                        <th>PRENOM</th>
                                        <th>MAIL</th>
                                        <th>TELEPHONE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                                    while ($donnees = $reponse->fetch())
                                    {
                                        if($donnees['ID']==$user->get('ID')){
                                            // Cette condition permet de ne pas afficher l'utilisateur dans ses propres contacts
                                        }
                                        else{
                                            echo
                                                '
                                                    <tr>
                                                      <td>'.$donnees['NICKNAME'].'</td>
                                                      <td>'.$donnees['LASTNAME'].'</td>
                                                      <td><a href="mailto:'.$donnees['MAIL'].'">'.$donnees['MAIL'].'</a></td>
                                                      <td><a href="tel:'.+$donnees['PHONENUMBER'].'">'.$donnees['PHONENUMBER'].'</a></td>
                                                    </tr>
                                                '
                                            ;
                                        }
                                    }

                                    $reponse->closeCursor(); // Termine le traitement de la requête

                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="col-lg-4 col-lg-offset-1">
                            <div class="page-header">
                                <h1 id="tables">Paramètres</h1>
                            </div>
                            <div class="well bs-component">
                                <form class="form-horizontal" action="./index.php" method="POST">
                                    <fieldset>
                                        <legend></legend>
                                        <div class="form-group">
                                            <label for="inputEmail" class="control-label">Email:</label>
                                            <input type="text" name ="inputEmail" class="form-control" id="inputEmail" placeholder="<?php echo $user->get("MAIL");?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword" class="control-label">Mot de passe unicom:</label>
                                            <input type="password" name ="inputUnicomPass" class="form-control" id="inputUnicomPass" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword" class="control-label">Mot de passe de votre boite vocale (4 chiffres):</label>
                                            <input type="password" name ="inputVocalePass" class="form-control" id="inputVocalePass" placeholder="1234">
                                        </div>
                                        <!-- SUBMIT BUTTON -->
                                        <button id="submit" name ="setParams" class ="btn btn-success btn-lg"> Valider </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="page-header">
        <h1 id="tables">Messages vocaux</h1>
    </div>
    <div class="panel panel-success">

        <div class="panel-heading">
            <h3 class="panel-title">Panel success</h3>
        </div>


        <!--
        $dir_nom = '.'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  ('point')
        $dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
        $fichier= array(); // on déclare le tableau contenant le nom des fichiers
        $dossier= array(); // on déclare le tableau contenant le nom des dossiers

        while($element = readdir($dir)) {
            if($element != '.' && $element != '..') {
                if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
                else {$dossier[] = $element;}
            }
        }

        closedir($dir);

        if(!empty($dossier)) {
            sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
            echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
            echo "\t\t<ul>\n";
            foreach($dossier as $lien){
                echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
            }
            echo "\t\t</ul>";
        }

        if(!empty($fichier)){
            sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
            echo "Liste des fichiers/documents accessibles dans '$dir_nom' : \n\n";
            echo "\t\t<ul>\n";
            foreach($fichier as $lien) {
                echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
            }
            echo "\t\t</ul>";
        }


        <div class="panel-body">
            <div class="bs-component">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>DATE</th>
                        <th>TEST</th>
                        <th>Column heading</th>
                        <th>Column heading</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2</td>
                        <td>Column content</td>
                        <td><audio src="audio.mp3" preload="auto" controls></audio></td>
                        <td>Column content</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                    </tr>
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
</div>
<?php include_once ("./V/INCLUDE/footer.php"); ?>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/bootswatch.js"></script>
</body>
</html>
