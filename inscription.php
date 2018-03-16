<?php
    include('fonction.php');
    $idConn = Open_DB();
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
<?php entete(); ?>

<!-- Page Header -->
<header class="masthead header-inscription">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><center>Inscrivez-vous</center></h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="traitement_inscription.php" method="post">
                <div class="row">
                    <p class="h3"> Informations : </p>

                    <div class="col-lg-18 col-md-12 ">
                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="nomPers" placeholder="Nom *" required="true">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="prenomPers" placeholder="Prenom">
                        </div>

                        <div class="margin-items-inscription">
                        <label><font size="3">Date de naissance (*) :</font></label>
                        <input type="date" class="form-control" name="dateNaissPers" required="true">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="adresseL1Pers" placeholder="Adresse *"
                               required="true">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="adresseL2Pers" placeholder="Adresse ligne 2">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="mailResp" placeholder="Mail *" required="true">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="telephoneResp"
                               placeholder="Telephone (05.--.--.--.--)">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="cpResp" placeholder="Code postal *"
                               required="true">
                        </div>

                        <div class="margin-items-inscription">
                        <input type="text" class="form-control" name="villeResp" placeholder="Ville *" required="true">
                        </div>
                    </div>
                    <br>
                </div>
                <br>
                <input type="submit" value="Valider" class="btn btn-primary validation"
                       onmouseover="this.style.cursor='pointer'"/>
            </form>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
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
                <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
