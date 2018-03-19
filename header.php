<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <?php
                    session_start();
                    if(isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
                        if($_SESSION['type'] == 'Administrateur') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Espace Administrateur</a>
                            </li>
                            <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="monCompte.php">Mon Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Déconnexion</a>
                        </li>

                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">Connexion</a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>