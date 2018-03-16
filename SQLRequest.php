<?php
#region Fonctions OpenDB et CloseDb
    /* fonction BDD */

    /* fonction ouverture base de données */
    function Open_DB()
    {
        /*Connection base de données*/
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $nom_data_base = 'ppe_site';
        //Overture de la connection
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
#endregion


?>