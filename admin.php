<?php
    include("fonction.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clean Blog - Start Bootstrap Theme</title>
    <?php cssLink(); ?>
</head>
<body>

    <?php
        if(isset($_GET['id']) && isset($_POST['TypePers'])) {
            $TypePers = $_POST['TypePers'];

            $idConn = Open_DB();
            $SQLQuery = "UPDATE `personnel` SET `TypePers`='" . $TypePers . "' WHERE personnel.IdPers='" . $_GET['id'] . "'";
            $SQLResult = mysqli_query($idConn, $SQLQuery);
        }

        entete();
    ?>

    <!-- Page Header -->
    <header class = "masthead header-admin">
        <div class = "overlay"></div>
        <div class = "container">
            <div class = "row">
                <div class = "col-lg-8 col-md-10 mx-auto">
                    <div class = "site-heading">
                        <h2>Logicruse</h2>
                        <span class = "subheading">Espace Administrateur</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class = "container">
        <table class = "table table-hover table-user">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Courriel</th>
                <th>Type d'employé</th>
            </tr>
            </thead>
            <tbody>
            <?php
                GetCompte();
            ?>
            </tbody>
        </table>
    </div>

</body>
</html>