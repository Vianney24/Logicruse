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
        $idPers = $_SESSION['id'];
        deleteUserAccount($idPers);
        deconnexion();
    ?>
</body>
</html>