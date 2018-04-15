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

    <div class="btn-compte">
        <a href="modificationInfoUser.php" class="btn btn-primary">Modifier vos informations personnelles</a>
        <a href="modificationConnexionUser.php" class="btn btn-primary">Modifier vos informations de connexion</a>
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