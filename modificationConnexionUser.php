<?php
    include('fonction.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clean Blog - Start Bootstrap Theme</title>
    <?php cssLink(); ?>
</head>
<body>
    <!-- header -->
    <?php
        entete();
        $idPers = $_SESSION['id'];
        $listeInfo = GetInfoUser($idPers);
    ?>

    <!-- Page Header -->
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Logicruse</h1>
                        <span class="subheading">Société de croisière</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="traitement_modificationConnexionUser.php" method="post">
                    <div class="row">
                        <p class="h3 margin-items-inscription-titre"> Informations de connexion: </p>

                        <div class="col-lg-18 col-md-12 ">

                            <div class="margin-items-inscription">
                                <label><i>Identifiant *</i></label>
                                <br>
                                <input type="text" class="col-md-5 form-control" name="identifiant" required value="<?php print($listeInfo['IdentifiantPers']); ?>">
                            </div>
                            <div class="margin-items-inscription">
                                <label><i>Mots de passe *</i></label>
                                <br>
                                <input type="password" class="form-control col-md-5" name="motDePasseNew1" placeholder="Nouveau mot de passe *" required>
                                <br>
                                <input type="password" class="form-control col-md-5" name="motDePasseNew2" placeholder="Confirmez votre nouveau mot de passe *" required>
                            </div>

                            <br>
                            <p>* champs obligatoires</p>

                        </div>
                    </div>
                    <br>
                    <input type="submit" value="Modifier" class="btn btn-primary validation"
                           onmouseover="this.style.cursor='pointer'"/>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Logicruse 2018</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>