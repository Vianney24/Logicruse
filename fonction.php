<?php
    include("SQLRequest.php");

    /* fonction pour inclure le header */
    function entete()
    {
        include('header.php');
    }

    /* fonction pour inclure tous les liens css */
    function cssLink()
    {
        $script = '<!-- Bootstrap core CSS -->
                   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                   <!-- Custom styles for this template -->
                   <link href="css/clean-blog.min.css" rel="stylesheet">
                   <!-- styles site -->
                   <link href="css/style.css" rel="stylesheet">
                   <link href="css/main.css" rel="stylesheet">
                   <!-- styles util -->
                   <link href="css/util.css.css" rel="stylesheet">';
        print($script);
    }

?>