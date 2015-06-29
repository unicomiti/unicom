<!-- Admin -->
<!DOCTYPE html>
<html lang="en">

<?php include_once ("./V/INCLUDE/header.php"); ?>

<body>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="../" class="navbar-brand">Unicom</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./C/C_logout.php" class="fa fa-sign-out fa-x" target="_blank">Déconnection</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container">

<!-- Containers
  ================================================== -->
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <div class="bs-component">
          <div class="jumbotron">
            <h1>Unicom - Espace d'aministration</h1>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Forms
  ================================================== -->

  <div class="page-header">
    <h1 id="tables">Gestion des utilisateurs</h1>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"></h3>
    </div>
    <div class="panel-body">
      <div class="bs-component">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>STATUS</th>
              <th>NOM</th>
              <th>PRENOM</th>
              <th>MOT DE PASSE</th>
              <th>MAIL</th>
              <th>TELEPHONE</th>
              <th>GROUPE</th>
              <th>SUPPRIMER</th>
              <th>MODIFIER</th>
            </tr>
          </thead>

          <tbody>

            <?php

            while ($donnees = $reponse->fetch())
            {
              echo '
              <form class="form-horizontal">
              <tr>
              <td><input type="text" class="form-control" id="inputEmail" placeholder='.$donnees['STATUS'].'></td>
              <td><input type="text" class="form-control" id="inputEmail" placeholder='.$donnees['NAME'].'></td>
              <td><input type="text" class="form-control" id="inputext" placeholder='.$donnees['NICKNAME'].'></td>
              <td><input type="password" class="form-control" id="inputPassord" placeholder='.$donnees['PASSWORD'].'></td>
              <td><input type="mail" class="form-control" id="inputEmail" placeholder='.$donnees['MAIL'].'></td>
              <td><input type="text" class="form-control" id="inputEmail" placeholder='.$donnees['PHONENUMBER'].'></td>

              <td>
              <div class="form-group">
              <select class="form-control" id="select">
              <option>groupe1</option>
              <option>groupe2</option>
              <option>groupe3</option>
              <option>groupe4</option>
              <option>groupe5</option>
              </select>
              </div>
              </td>

              <td><a href="#" class="btn btn-info">Valider</a></td>
              <td><a href="#" class="btn btn-danger">Supprimer</a></td>
              </tr>
              '
              ;
            }
              $reponse->closeCursor(); // Termine le traitement de la requête
              ?>
              <tr>
                <td> <input type="text" class="form-control" id="inputEmail" placeholder="auto" disabled="disabled"></td>
                <td> <input type="text" class="form-control" id="inputEmail" placeholder="nom"></td>
                <td> <input type="text" class="form-control" id="inputEmail" placeholder="prenom"></td>
                <td> <input type="text" class="form-control" id="inputEmail" placeholder="mot de passe"></td>
                <td> <input type="text" class="form-control" id="inputEmail" placeholder="mail@example.fr"></td>
                <td> <input type="text" class="form-control" id="inputEmail" placeholder="600x"></td>

                <td>
                  <div class="form-group">
                    <select class="form-control" id="select">
                      <option>groupe1</option>
                      <option>groupe2</option>
                      <option>groupe3</option>
                      <option>groupe4</option>
                      <option>groupe5</option>
                    </select>
                  </div>
                </td>

                <td></td>
                <td><a href="#" class="btn btn-success">Ajouter</a></td>
              </tr>
            </form>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
  <div class="page-header">
    <h1 id="tables">Gestion des groupes</h1>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"></h3>
    </div>
    <div class="panel-body">
      <div class="bs-component">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Peux appeller</th>
              <th>MODIFIER</th>
              <th>SUPPRIMER</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>groupe1</td>
              <td>
                <div class="form-group">
                  <select class="form-control" id="select">
                    <option>groupe1</option>
                    <option>groupe2</option>
                    <option>groupe3</option>
                    <option>groupe4</option>
                    <option>groupe5</option>
                  </select>
                </div>
              </td>
              <td><a href="#" class="btn btn-info">Valider</a></td>
              <td><a href="#" class="btn btn-danger">Supprimer</a></td>
            </tr>

            <tr>
              <td> <input type="text" class="form-control" id="inputEmail" placeholder="nom"></td>
              <td>
                <div class="form-group">
                  <select class="form-control" id="select">
                    <option>groupe1</option>
                    <option>groupe2</option>
                    <option>groupe3</option>
                    <option>groupe4</option>
                    <option>groupe5</option>
                  </select>
                </div>
              </td>
              <td><a href="#" class="btn btn-success">Ajouter</a></td>
            </tr>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
  <div class="page-header">
    <h1 id="tables">Gestion des passerelles</h1>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"></h3>
    </div>
    <div class="panel-body">
      <div class="bs-component">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>LOGIN</th>
              <th>PASSWORD</th>
              <th>IP / HOSTNAME</th>
              <th>PORT</th>
              <th>SWITCH</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>unicom</td>
              <td>passUnicom</td>
              <td>sip.free.fr</td>
              <td>5060</td>
              <td>01</td>
            </tr>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once ("./V/INCLUDE/footer.php"); ?>
</body>
</html>
