<?php
    include('fonction.php');
    session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
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

</body>
</html>