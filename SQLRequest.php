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
        $nom_data_base = 'bdd-ppe-lourd';
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
        if(!empty($_POST['nomPers'] && $_POST['dateNaissPers'] && $_POST['adresseL1Pers'] && $_POST['mailPers'] && $_POST['cpPers'] && $_POST['villePers'] && $_POST['identifiant'] && $_POST['motDePasse'] && $_POST['motDePasse2'])) {
            $error = "ok";
            $idConn = Open_DB();
            $SQL = 'SELECT IFNULL(MAX(IdPers),0)+1 FROM personnel';
            $SQLResId = mysqli_query($idConn, $SQL);
            $SQLRowId = mysqli_fetch_array($SQLResId);
            $idPers = $SQLRowId[0];
            mysqli_free_result($SQLResId);

            $nom = $_POST['nomPers'];
            if(isset($_POST['prenomPers']))
                $prenom = $_POST['prenomPers']; else
                $prenom = null;
            $date = $_POST['dateNaissPers'];
            $adresse = $_POST['adresseL1Pers'];
            if(isset($_POST['adresseL2Pers']))
                $adresse2 = $_POST['adresseL2Pers']; else
                $adresse2 = null;
            $mail = $_POST['mailPers'];
            if(isset($_POST['telephonePers']))
                $telephone = $_POST['telephonePers']; else
                $telephone = null;
            $cp = $_POST['cpPers'];
            $ville = $_POST['villePers'];
            $identifiant = $_POST['identifiant'];
            if($_POST['motDePasse2'] == $_POST['motDePasse']) {
                if(strlen($_POST['motDePasse']) > 4) {
                    $motDePasse = sha1($_POST['motDePasse']);
                } else {
                    $error = "Mot de passe trop court !";
                }
            } else
                $error = "Les mots de passes rentrés ne sont pas identiques !";

            if($error == "ok") {
                $SQLQuery = 'INSERT INTO personnel(IdPers, NomPers, PrenomPers, DateNaissancePers, AdL1Pers, AdL2Pers, MailPers,
TelephonePers, CpPers, VillePers, TypePers, IdentifiantPers, MotDePassePers) ';
                $SQLQuery .= "VALUES ($idPers, '$nom', '$prenom', '$date', '$adresse', '$adresse2', '$mail', '$telephone',
                 '$cp', '$ville', 'Utilisateur', '$identifiant', '$motDePasse')";
                mysqli_query($idConn, $SQLQuery);
            } else {
                print($error);
            }
        } else {
            $script = '<p> Erreur, veuillez remplir au minimum tous les champs obligatoires</p>';
            print($script);
        }
    }

    #endregion

    #region Fonction Connexion
    function connexion()
    {
        $login = $_POST["login"];
        $pwd = $_POST["pwd"];

        $idConn = Open_DB();
        $SQLQuery = "SELECT * FROM `personnel` WHERE IdentifiantPers='" . $login . "'";
        $SQLResult = mysqli_query($idConn, $SQLQuery);
        $SQLRow = mysqli_fetch_array($SQLResult);
        $login_valide = $SQLRow['IdentifiantPers'];
        $pwd_valide = $SQLRow['MotDePassePers'];
        $type = $SQLRow['TypePers'];

        if(isset($login) && isset($pwd) && isset($login_valide)) {
            if($login_valide == $login && $pwd_valide == sha1($pwd)) {
                session_start();
                $_SESSION['login'] = $login_valide;
                $_SESSION['pwd'] = $pwd_valide;
                $_SESSION['type'] = $type;
                print('<div class="alert alert-success message_connexion" role="alert">
        	 			<strong><span class="glyphicon glyphicon-ok"></span><br>Vous êtes maintenant connecté</strong>
        				</div>');
            } else {
                print('<div class="alert alert-danger message_connexion" role="alert">
                    <strong><span class="glyphicon glyphicon-remove"></span><br>Echec de la connection !</strong><br>
                    <a href="admin_connexion.php"> Retour </a> 
                    </div>');
            }
        } else {
            print('<div class="alert alert-danger message_connexion" role="alert">
                    <strong><span class="glyphicon glyphicon-remove"></span><br>Echec de la connection !</strong><br>
                    <a href="admin_connexion.php"> Retour </a> 
                    </div>');
        }
    }

    #endregion

    #region Fonction Déconnexion
    Function deconnexion()
    {
        session_start ();
        session_unset ();
        session_destroy ();
    }

    #endregion
?>