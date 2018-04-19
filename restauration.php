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

    <div class="container">
        <h2 class="titre-commande">Commandes</h2>
        <br>
        <div class="table-container">
            <div class="btn-group btn-tri">
                <a href="restauration.php?t=1" class="btn btn-outline-primary col-md-4 mesBtn">En Cours</a>
                <a href="restauration.php?t=2" class="btn btn-outline-primary col-md-4 mesBtn">Livrées</a>
                <a href="restauration.php?t=3" class="btn btn-outline-primary col-md-4 mesBtn">Toutes</a>
            </div>
            <table class="table table-hover maTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de création</th>
                    <th>Fournisseur</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET['t'])) {
                        $tri = $_GET['t'];
                        if($tri == 1) {
                            $Commandes = GetPrevCommandes();

                            foreach($Commandes as $Commande) {
                                print("<tr>
                                            <td>" . $Commande['IdBon'] . "</td>
                                            <td>" . $Commande['DateBon'] . "</td>
                                            <td>" . $Commande['NomFour'] . ", Numéro de SIRET: " . $Commande['NumSiretFour'] . "</td>
                                            <td><a href='modificationCommande.php?id=" . $Commande['IdBon'] . "' class='btn btn-danger'>Modifier</a></td>
                                           </tr>");
                            }
                        } elseif($tri == 2) {
                            $Commandes = GetPastCommandes();

                            foreach($Commandes as $Commande) {
                                print("<tr>
                                            <td>" . $Commande['IdBon'] . "</td>
                                            <td>" . $Commande['DateBon'] . "</td>
                                            <td>" . $Commande['NomFour'] . ", Numéro de SIRET: " . $Commande['NumSiretFour'] . "</td>
                                           </tr>");
                            }
                        } elseif($tri == 3) {
                            $Commandes = GetAllCommandes();
                            foreach($Commandes as $Commande) {
                                print("<tr>
                                            <td>" . $Commande['IdBon'] . "</td>
                                            <td>" . $Commande['DateBon'] . "</td>
                                            <td>" . $Commande['NomFour'] . ", Numéro de SIRET: " . $Commande['NumSiretFour'] . "</td>
                                           </tr>");

                            }
                        }
                    } else {
                        $Commandes = GetAllCommandes();

                        foreach($Commandes as $Commande) {
                            print("<tr>
                                        <td>" . $Commande['IdBon'] . "</td>
                                        <td>" . $Commande['DateBon'] . "</td>
                                        <td>" . $Commande['NomFour'] . ", Numéro de SIRET: " . $Commande['NumSiretFour'] . "</td>
                                       </tr>");

                        }
                    }


                ?>
                </tbody>
            </table>
        </div>
    </div>

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
                    <p class="copyright text-muted">Copyright &copy; Logicruse 2018</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>