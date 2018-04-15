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

    <table class="table table-hover table-user">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Adresse</th>
            <th>Complément d'Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Courriel</th>
            <th>Téléphone</th>
        </tr>
        </thead>
        <tbody>
        <td><?php print($listeInfo['NomPers']); ?></td>
        <td><?php print($listeInfo['PrenomPers']); ?></td>
        <td><?php print($listeInfo['DateNaissancePers']); ?></td>
        <td><?php print($listeInfo['AdL1Pers']); ?></td>
        <td><?php print($listeInfo['AdL2Pers']); ?></td>
        <td><?php print($listeInfo['VillePers']); ?></td>
        <td><?php print($listeInfo['CpPers']); ?></td>
        <td><?php print($listeInfo['MailPers']); ?></td>
        <td><?php print($listeInfo['TelephonePers']); ?></td>
        </tbody>
    </table>
    <br>
    <div class="btn-compte">
        <a href="modificationUser.php" class="btn btn-primary">Modifier votre profil</a>
        <a href="deleteUser.php" class="btn btn-danger" onclick="return(confirm('Etes-vous sûr de vouloir supprimer votre compte ?'))">Supprimer votre compte</a>
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