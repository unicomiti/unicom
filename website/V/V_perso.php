<!-- Perso -->
<!DOCTYPE html>
<html lang="en">

<?php include_once ("./V/INCLUDE/header.php"); ?>

<body>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="../" class="navbar-brand">Unicom</a>
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./C/C_logout.php" class="fa fa-sign-out fa-x" target="_blank">Déconnection</a></li>
      </ul>
    </div>
  </div>
</div>
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
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Mail</th>
                      <th>Téléphone</th>
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
                        echo '<tr>
                        <td>'.$donnees['NICKNAME'].'</td>
                        <td>'.$donnees['NAME'].'</td>
                        <td>'.$donnees['MAIL'].'</td>
                        <td>'.$donnees['PHONENUMBER'].'</td>
                        </tr>'
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
                  <form class="form-horizontal">
                    <fieldset>
                      <legend></legend>
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Email:</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <label for="inputPassword" class="control-label">Mot de passe unicom:</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="inputPassword" class="control-label">Mot de passe de votre boite vocale (4 chiffres):</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="1234">
                      </div>
                      <!-- SUBMIT BUTTON -->
                      <button id = "submit" name = "valider" class = "btn btn-success btn-lg" value = "create_project"> Valider </button>
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
      <div class="panel-body">
        <div class="bs-component">
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Column heading</th>
                <th>Column heading</th>
                <th>Column heading</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
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
              <tr>
                <td>2</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
              </tr>
            </tbody>
          </table> 
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
