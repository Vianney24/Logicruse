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
                <form action="traitement_modificationInfoUser.php" method="post">
                    <div class="row">
                        <p class="h3"> Informations personnelles : </p>

                        <div class="col-lg-18 col-md-12 ">
                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="nomPers" placeholder="Nom *" required
                                        value="<?php print($listeInfo['NomPers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="prenomPers" placeholder="Prenom" required
                                       value="<?php print($listeInfo['PrenomPers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <label><font size="3">Date de naissance (*) :</font></label>
                                <input type="date" class="form-control" name="dateNaissPers" required
                                       value="<?php print($listeInfo['DateNaissancePers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="adresseL1Pers" placeholder="Adresse *"
                                       required="true" value="<?php print($listeInfo['AdL1Pers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="adresseL2Pers"
                                       placeholder="Complément d'adresse" value="<?php print($listeInfo['AdL2Pers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="mailPers" placeholder="Mail *" required
                                       value="<?php print($listeInfo['MailPers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="telephonePers"
                                       placeholder="Telephone (05.--.--.--.--)" value="<?php print($listeInfo['TelephonePers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="cpPers" placeholder="Code postal *"
                                       required value="<?php print($listeInfo['CpPers']) ?>">
                            </div>

                            <div class="margin-items-inscription">
                                <input type="text" class="form-control" name="villePers" placeholder="Ville *" required
                                       value="<?php print($listeInfo['VillePers']) ?>">
                            </div>

                            <br>
                            <p>* champs obligatoires</p>
                        </div>
                        <br>
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