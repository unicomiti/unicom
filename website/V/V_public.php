<!-- Public -->

<!DOCTYPE html>
<html>
<?php include_once ("./V/INCLUDE/header.php"); ?>
<body>
<div class = "site-wrapper">
    <div class = "site-wrapper-inner">
        <div class="col-lg-12" >		<!-- Colonne -->
            <div class="inner cover">		<!-- Background -->
                <h1 class="cover-heading">
                    Bienvenue sur Unicom
                </h1>
                <div class="col-lg-2 col-lg-offset-5" >
                    <form class="form-horizontal" action="#" method="POST">
                        <p class="lead">
                            Connectez-vous:
                        </p>
                        <!-- PSEUDO INPUT -->
                        <input id="nickname_login_input" name="nickname_login_input" type="text" placeholder="Nom" class="form-control input-md" required="">
                        <br/>
                        <!-- PASSWORD INPUT -->
                        <input id="password_login_input" name="password_login_input" type="password" placeholder="Password" class="form-control input-md" required="">
                        <br/>
                        <!-- LOG IN BUTTON -->
                        <button id="submit" name="login" class="btn btn-primary btn-lg" value="login">Connexion</button>
                        <p><br><br><br><br><br>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include_once ("./V/INCLUDE/footer.php"); ?>
</html>
