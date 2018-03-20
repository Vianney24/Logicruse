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
                print('<div class="alert alert-success">Vous êtes maintenant connecté</div>');
            } else {
                print('<div class="alert alert-danger">Echec de la connection !</div>');
            }
        } else {
            print('<div class="alert alert-danger">Echec de la connection !</div>');
        }
    }

    #endregion

    #region Fonction Déconnexion
    Function deconnexion()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    #endregion

    #region Fonction GetCompte
    function GetCompte()
    {
        $idConn = Open_DB();
        $SQLQuery = "SELECT * FROM `personnel`";
        $SQLResult = mysqli_query($idConn, $SQLQuery);

        while($SQLRow = mysqli_fetch_array($SQLResult)) {
            $IdPers = $SQLRow['IdPers'];
            $NomPers = $SQLRow['NomPers'];
            $PrenomPers = $SQLRow['PrenomPers'];
            $DateNaissancePers = $SQLRow['DateNaissancePers'];
            $MailPers = $SQLRow['MailPers'];
            $TypePers = $SQLRow['TypePers'];

            if($_SESSION['login'] == $SQLRow['IdentifiantPers'] && $_SESSION['pwd'] == $SQLRow['MotDePassePers']) {
                print('
                    <tr class="alert-info">
                        <td>' . $IdPers . '</td>
                        <td>' . $NomPers . '</td>
                        <td>' . $PrenomPers . '</td>
                        <td>' . $DateNaissancePers . '</td>
                        <td>' . $MailPers . '</td>                        
                ');
                if($TypePers == 'Administrateur') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur" selected>Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                } elseif($TypePers == 'Utilisateur') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur" selected>Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                } elseif($TypePers == 'Restaurateur') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur" selected>Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                } elseif($TypePers == 'Surveillant') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant" selected>Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                }
            } else {
                print('
                    <tr>
                        <td>' . $IdPers . '</td>
                        <td>' . $NomPers . '</td>
                        <td>' . $PrenomPers . '</td>
                        <td>' . $DateNaissancePers . '</td>
                        <td>' . $MailPers . '</td>
                ');
                if($TypePers == 'Administrateur') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur" selected>Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                } elseif($TypePers == 'Utilisateur') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur" selected>Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                } elseif($TypePers == 'Restaurateur') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur" selected>Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                } elseif($TypePers == 'Surveillant') {
                    print('<td>
                            <div class="form-group col">
                                <select class="form-control col-md-5">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant" selected>Surveillant</option>
                                </select>
                                <a href="#" class="btn btn-primary col-md-6">Enregistrer</a>
                            </div>
                        </td>
                    </tr>');
                }
            }
        }
    }

    #endregion
?>