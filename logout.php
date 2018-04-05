<?php
    include("fonction.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clean Blog - Start Bootstrap Theme</title>
    <?php cssLink(); ?>
</head>
<body>
    <?php
        deconnexion();
    ?>
    <div class="alert alert-danger message-login"><h3>Vous êtes déconnecté</h3>Redirection dans quelques secondes</div>
</body>
</html>