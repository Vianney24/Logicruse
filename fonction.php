<?php
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
    
    /* fonction BDD */
    
        /* fonction ouverture base de données */
        function Open_DB()
        {
            /*Connection base de données*/
            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $nom_data_base = 'ppe_site';
            //Ouverture de la connection
            $idConn = mysqli_connect($server, $user, $pass);
            //Selection de la base de donnée
            mysqli_select_db($idConn, $nom_data_base);
            
            return $idConn;
        }
        
        /* fonction fermeture base de données */
        function Close_DB($idConn)
        {
            mysqli_close($idConn);
        }
?>