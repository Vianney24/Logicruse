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
        $nom_data_base = 'bdd-bts';
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

    #region Fonction inscription
    function inscription()
    {
        if(!empty($_POST['nomPers'] && $_POST['dateNaissPers'] && $_POST['adresseL1Pers'] && $_POST['mailPers'] && $_POST['cpPers']
            && $_POST['villePers'] && $_POST['identifiant'] && $_POST['motDePasse'] && $_POST['motDePasse2']))
        {
            $error = "ok";
            $idConn = Open_DB();
            $SQL = 'SELECT IFNULL(MAX(IdPers),0)+1 FROM personnel';
            $SQLResId = mysqli_query($idConn, $SQL);
            $SQLRowId = mysqli_fetch_array($SQLResId);
            $idPers = $SQLRowId[0];
            mysqli_free_result($SQLResId);

            $nom = $_POST['nomPers'];
            if (isset($_POST['prenomPers']))
                $prenom = $_POST['prenomPers'];
            else
                $prenom = null;
            $date = $_POST['dateNaissPers'];
            $adresse = $_POST['adresseL1Pers'];
            if (isset($_POST['adresseL2Pers']))
                $adresse2 = $_POST['adresseL2Pers'];
            else
                $adresse2 = null;
            $mail = $_POST['mailPers'];
            if (isset($_POST['telephonePers']))
                $telephone = $_POST['telephonePers'];
            else
                $telephone = null;
            $cp = $_POST['cpPers'];
            $ville = $_POST['villePers'];
            $identifiant= $_POST['identifiant'];
            if ($_POST['motDePasse2'] == $_POST['motDePasse'])
            {
                if (strlen($_POST['motDePasse']) > 4)
                {
                    $motDePasse = sha1($_POST['motDePasse']);
                }
                else
                {
                    $error = "Mot de passe trop court !";
                }
            }
            else
                $error = "Les mots de passes rentrés ne sont pas identiques !";

            if ($error == "ok")
            {
                $SQLQuery = 'INSERT INTO personnel(IdPers, NomPers, PrenomPers, DateNaissancePers, AdL1Pers, AdL2Pers, MailPers,
TelephonePers, CpPers, VillePers, TypePers, IdentifiantPers, MotDePassePers) ';
                $SQLQuery .= "VALUES ($idPers, '$nom', '$prenom', '$date', '$adresse', '$adresse2', '$mail', '$telephone',
                 '$cp', '$ville', 'Utilisateur', '$identifiant', '$motDePasse')";
                mysqli_query($idConn, $SQLQuery);
            }
            else
            {
                print($error);
            }
        }
        else
        {
            $script = '<p> Erreur, veuillez remplir au minimum tous les champs obligatoires</p>';
            print($script);
        }
    }
    #endregion

?>