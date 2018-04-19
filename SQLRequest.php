<?php
    #region Fonctions OpenDB et CloseDb
    /* fonction BDD */

    /* fonction ouverture base de données */

    use PHPMailer\PHPMailer\PHPMailer;

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

            if(isset($_POST['nomPers']))
                $nom = $_POST['nomPers']; else
                $nom = null;

            if(isset($_POST['prenomPers']))
                $prenom = $_POST['prenomPers']; else
                $prenom = null;

            $date = $_POST['dateNaissPers'];

            if(isset($_POST['adresseL1Pers']))
                $adresse = $_POST['adresseL1Pers']; else
                $adresse = null;

            if(isset($_POST['adresseL2Pers']))
                $adresse2 = $_POST['adresseL2Pers']; else
                $adresse2 = null;

            if(isset($_POST['mailPers']))
                $mail = $_POST['mailPers']; else
                $mail = null;

            if(isset($_POST['telephonePers']))
                $telephone = $_POST['telephonePers']; else
                $telephone = null;

            if(isset($_POST['cpPers']))
                $cp = $_POST['cpPers']; else
                $cp = null;

            if(isset($_POST['villePers']))
                $ville = $_POST['villePers']; else
                $ville = null;

            if(isset($_POST['identifiant']))
                $identifiant = $_POST['identifiant']; else
                $identifiant = null;

            if($_POST['motDePasse2'] == $_POST['motDePasse']) {
                if(strlen($_POST['motDePasse']) > 4) {
                    $motDePasse = sha1($_POST['motDePasse']);
                } else {
                    $error = "Mot de passe trop court !";
                }
            } else
                $error = "Les mots de passes rentrés ne sont pas identiques !";


            if($nom == null || $prenom == null || $adresse == null || $mail == null || $cp == null || $ville = null || $identifiant == null || $motDePasse == null)
                $error = 'Veuillez remplir tout les champs obligatoires';


            if($error == "ok") {
                $SQLQuery = "INSERT INTO personnel(IdPers, NomPers, PrenomPers, DateNaissancePers, AdL1Pers, AdL2Pers, MailPers,
TelephonePers, CpPers, VillePers, TypePers, IdentifiantPers, MotDePassePers) ";
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
        $idPers = $SQLRow['IdPers'];
        $login_valide = $SQLRow['IdentifiantPers'];
        $pwd_valide = $SQLRow['MotDePassePers'];
        $type = $SQLRow['TypePers'];
        $prenom = $SQLRow['PrenomPers'];

        if(isset($login) && isset($pwd) && isset($login_valide)) {
            if($login_valide == $login && $pwd_valide == sha1($pwd)) {
                $_SESSION['id'] = $idPers;
                $_SESSION['login'] = $login_valide;
                $_SESSION['pwd'] = $pwd_valide;
                $_SESSION['type'] = $type;
                print('<div class="alert alert-success message-login"><h3>Bonjour <b>' . $prenom . '</b>, vous êtes bien connecté</h3>Redirection dans quelques secondes</div>');
                header('Refresh: 2; url=/index.php');
            } else {
                print('<div class="alert alert-danger message-login"><h3>Echec de la connection</h3> Identifiant ou Mot de passe incorrect<br>Redirection dans quelques secondes</div>');
                header('Refresh: 2; url=/connexion.php');
            }
        } else {
            print('<div class="alert alert-danger message-login"><h3>Echec de la connection</h3> Identifiant ou Mot de passe incorrect<br>Redirection dans quelques secondes</div>');
            header('Refresh: 2; url=/connexion.php');
        }
    }

    #endregion

    #region Fonction Déconnexion
    Function deconnexion()
    {
        session_unset();
        session_destroy();
        header('Refresh: 2; url=/index.php');
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
                print('<tr class="alert-info">');
            } else {
                print('<tr>');
            }

            print('<td>' . $IdPers . '</td>
                        <td>' . $NomPers . '</td>
                        <td>' . $PrenomPers . '</td>
                        <td>' . $DateNaissancePers . '</td>
                        <td>' . $MailPers . '</td>');
            if($TypePers == 'Administrateur') {
                print('<td>
                            <form class="form-group col" action="admin.php?id=' . $IdPers . '" method="post">
                                <select class="form-control col-md-5" name="TypePers">
                                  <option value="Administrateur" selected>Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <input type="submit" class="btn btn-primary col-md-6" onclick="return(confirm(\'Confirmer la modification ?\'))">
                            </form>
                        </td>
                    </tr>');
            } elseif($TypePers == 'Utilisateur') {
                print('<td>
                            <form class="form-group col" action="admin.php?id=' . $IdPers . '" method="post">
                                <select class="form-control col-md-5" name="TypePers">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur" selected>Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <input type="submit" class="btn btn-primary col-md-6" onclick="return(confirm(\'Confirmer la modification ?\'))">
                            </form>
                        </td>
                    </tr>');
            } elseif($TypePers == 'Restaurateur') {
                print('<td>
                            <form class="form-group col" action="admin.php?id=' . $IdPers . '" method="post">
                                <select class="form-control col-md-5" name="TypePers">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur" selected>Restaurateur</option>
                                  <option value="Surveillant">Surveillant</option>
                                </select>
                                <input type="submit" class="btn btn-primary col-md-6" onclick="return(confirm(\'Confirmer la modification ?\'))">
                            </form>
                        </td>
                    </tr>');
            } elseif($TypePers == 'Surveillant') {
                print('<td>
                            <form class="form-group col" action="admin.php?id=' . $IdPers . '" method="post">
                                <select class="form-control col-md-5" name="TypePers">
                                  <option value="Administrateur">Administrateur</option>
                                  <option value="Utilisateur">Utilisateur</option>
                                  <option value="Restaurateur">Restaurateur</option>
                                  <option value="Surveillant" selected>Surveillant</option>
                                </select>
                                <input type="submit" class="btn btn-primary col-md-6" onclick="return(confirm(\'Confirmer la modification ?\'))">
                            </form>
                        </td>
                    </tr>');
            }
        }
    }

    #endregion

    #region Fonction RecupérationDeMDP
    function oubliMDP()
    {
        $newMDP = genererMDP(5);
        $mailPers = $_POST["email"];

        $idConn = Open_DB();
        $SQLQuery = "SELECT * FROM `personnel` WHERE MailPers= '" . $mailPers . "'";
        $SQLResult = mysqli_query($idConn, $SQLQuery);
        $SQLRow = mysqli_fetch_array($SQLResult);
        $SQLQuery = "UPDATE personnel
                      SET MotDePassePers = '" . sha1($newMDP) . "'
                      WHERE MailPers = '" . $mailPers . "'";
        $SQLResult = mysqli_query($idConn, $SQLQuery);


        require 'src/Exception.php';
        require 'src/PHPMailer.php';
        require 'src/SMTP.php';
        require 'src/OAuth.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

        if($SQLRow != null) {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ),
            );
            //Server settings
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = ' smtp.gmail.com';                      // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'smtp.remi.loubiou@gmail.com';      // SMTP username
            $mail->Password = 'remiremi';                         // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = '587';                                  // TCP port to connect to

            //Recipients
            $mail->setFrom('smtp.remi.loubiou@gmail.com');
            $mail->addAddress($mailPers);     // Add a recipient
            $mail->addReplyTo('remi.loubiou@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Changement de mot de passe (Logicruse)';
            $mail->Body = 'Votre mot de passe est : <b> ' . $newMDP . ' </b>';
            $mail->AltBody = 'Votre mot de passe est : ' . $newMDP;

            $mail->send();
            print('<div class="alert alert-success message-login"><h3>Récupération réussie</h3>Votre mot de passe a bien été envoyé a cette adresse mail : ' . $mailPers . '<br>Redirection dans quelques secondes</div>');
            header('Refresh: 7; url=/connexion.php');
        } else {
            print ('<div class="alert alert-danger message-login"><h3>Echec de la récupération</h3>l\'adresse mail : ' . $mailPers . ' n\'est pas reconnue<br>Redirection dans quelques secondes</div>');
            header('Refresh: 7; url=/connexion.php');
        }

        Close_DB($idConn);
    }

    function genererMDP($size)
    {
        $password = 0;
        // Initialisation des caractères utilisables
        $characters = array(
            0,
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            "a",
            "b",
            "c",
            "d",
            "e",
            "f",
            "g",
            "h",
            "i",
            "j",
            "k",
            "l",
            "m",
            "n",
            "o",
            "p",
            "q",
            "r",
            "s",
            "t",
            "u",
            "v",
            "w",
            "x",
            "y",
            "z",
        );

        for($i = 0; $i < $size; $i++) {
            $password .= ($i % 2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }

        return $password;
    }

    #endregion

    #region Fonctions GetInfoUser, user_info_modification et user_connexion_modification et deleteUserAccount
    function user_info_modification($idPers, $TypePers)
    {
        if(!empty($_POST['nomPers'] && $_POST['dateNaissPers'] && $_POST['adresseL1Pers'] && $_POST['mailPers'] && $_POST['cpPers'] && $_POST['villePers'])) {
            $error = "ok";
            $idConn = Open_DB();

            if(isset($_POST['nomPers']))
                $nom = $_POST['nomPers']; else
                $nom = null;

            if(isset($_POST['prenomPers']))
                $prenom = $_POST['prenomPers']; else
                $prenom = null;

            $date = $_POST['dateNaissPers'];

            if(isset($_POST['adresseL1Pers']))
                $adresse = $_POST['adresseL1Pers']; else
                $adresse = null;

            if(isset($_POST['adresseL2Pers']))
                $adresse2 = $_POST['adresseL2Pers']; else
                $adresse2 = null;

            if(isset($_POST['mailPers']))
                $mail = $_POST['mailPers']; else
                $mail = null;

            if(isset($_POST['telephonePers']))
                $telephone = $_POST['telephonePers']; else
                $telephone = null;

            if(isset($_POST['cpPers']))
                $cp = $_POST['cpPers']; else
                $cp = null;

            if(isset($_POST['villePers']))
                $ville = $_POST['villePers']; else
                $ville = null;

            if($nom == null || $prenom == null || $adresse == null || $mail == null || $cp == null || $ville == null)
                $error = 'Veuillez remplir tout les champs obligatoires';

            if($error == "ok") {
                $SQLQuery = "UPDATE `personnel` 
                             SET `IdPers`='$idPers',
                                 `NomPers`='$nom',
                                 `PrenomPers`='$prenom',
                                 `DateNaissancePers`='$date',
                                 `AdL1Pers`='$adresse',
                                 `AdL2Pers`='$adresse2',
                                 `VillePers`='$ville',
                                 `CpPers`='$cp',
                                 `MailPers`='$mail',
                                 `TelephonePers`='$telephone',
                                 `TypePers`='$TypePers'
                             WHERE `IdPers`='$idPers'";
                mysqli_query($idConn, $SQLQuery);
                print('<div class="alert alert-success message-login"><h4>Modifications effectuées avec succés</h4></div>');
            } else {
                print('<div class="alert alert-danger message-login"><b>' . $error . '</b> <br> <a href="modificationUser.php" class="btn btn-primary">Retour</a></div>');
            }
        } else {
            print('<div class="alert alert-danger message-login">Erreur, veuillez remplir au minimum tous les champs obligatoires</div>');
        }
    }

    function user_connexion_modification($idPers)
    {
        if(!empty($_POST['identifiant'] && $_POST['motDePasseNew1'] && $_POST['motDePasseNew2'])) {
            $error = "ok";
            $idConn = Open_DB();

            if(isset($_POST['identifiant']))
                $identifiant = $_POST['identifiant']; else
                $identifiant = null;

            if(isset($_POST['motDePasseNew1']))
                $motDePasseNew1 = sha1($_POST['motDePasseNew1']); else
                $motDePasseNew1 = null;

            if(isset($_POST['motDePasseNew2']))
                $motDePasseNew2 = sha1($_POST['motDePasseNew2']); else
                $motDePasseNew2 = null;

            if($_POST['motDePasseNew1'] != $_POST['motDePasseNew2'])
                $error = "Les mots de passe de correspondent pas";

            if($identifiant == null || $motDePasseNew1 == null || $motDePasseNew2 == null)
                $error = 'Veuillez remplir tout les champs obligatoires';

            if($error == "ok") {
                $SQLQuery = "UPDATE `personnel` 
                             SET `IdentifiantPers`='$identifiant',
                                 `MotDePassePers`='$motDePasseNew1'
                             WHERE `IdPers`='$idPers'";
                mysqli_query($idConn, $SQLQuery);

            } else {
                print('<div class="alert alert-danger message-login"><b>' . $error . '</b> <br> <a href="modificationUser.php" class="btn btn-primary">Retour</a></div>');
            }
        } else {
            print('<div class="alert alert-danger message-login">Erreur, veuillez remplir au minimum tous les champs obligatoires</div>');
        }
    }

    function deleteUserAccount($idPers)
    {
        $idConn = Open_DB();
        $SQLQuery = "DELETE FROM `personnel` WHERE IdPers=" . $idPers;
        mysqli_query($idConn, $SQLQuery);

        print('<div class="alert alert-success message-login"><h4>Compte Supprimé</h4></div>');
        header('Refresh: 2; url=/index.php');
    }

    function GetInfoUser($idPers)
    {
        $idConn = Open_DB();
        $SQLQuery = "SELECT * FROM `personnel` WHERE IdPers=" . $idPers;
        $SQLResult = mysqli_query($idConn, $SQLQuery);
        $SQLRow = mysqli_fetch_array($SQLResult);

        $IdPers = $SQLRow['IdPers'];
        $NomPers = $SQLRow['NomPers'];
        $PrenomPers = $SQLRow['PrenomPers'];
        $DateNaissancePers = $SQLRow['DateNaissancePers'];
        $AdL1Pers = $SQLRow['AdL1Pers'];
        $AdL2Pers = $SQLRow['AdL2Pers'];
        $VillePers = $SQLRow['VillePers'];
        $CpPers = $SQLRow['CpPers'];
        $MailPers = $SQLRow['MailPers'];
        $TelephonePers = $SQLRow['TelephonePers'];
        $TypePers = $SQLRow['TypePers'];
        $IdentifiantPers = $SQLRow['IdentifiantPers'];

        $listeInfo = [
            'IdPers'            => $IdPers,
            'NomPers'           => $NomPers,
            'PrenomPers'        => $PrenomPers,
            'DateNaissancePers' => $DateNaissancePers,
            'AdL1Pers'          => $AdL1Pers,
            'AdL2Pers'          => $AdL2Pers,
            'VillePers'         => $VillePers,
            'CpPers'            => $CpPers,
            'MailPers'          => $MailPers,
            'TelephonePers'     => $TelephonePers,
            'TypePers'          => $TypePers,
            'IdentifiantPers'   => $IdentifiantPers,
        ];

        return $listeInfo;
    }


    #endregion

    #region Fonctions restauration
    function GetAllCommandes()
    {
        $idConn = Open_DB();
        $SQLQuery = "
            SELECT bondecommande.IdBon, bondecommande.DateBon, fournisseur.NumSiretFour, fournisseur.NomFour FROM `lignereception` 
            INNER JOIN bondecommande ON bondecommande.IdBon=lignereception.BonIdLig
            INNER JOIN ingredient ON ingredient.IdIng=lignereception.IngIdLig
            INNER JOIN fournisseur ON fournisseur.IdFour=ingredient.FournisseurId
            GROUP BY bondecommande.IdBon
            ORDER BY bondecommande.DateBon DESC
        ";
        $SQLResult = mysqli_query($idConn, $SQLQuery);

        $listeCommande = [];
        $Compteur = 1;

        While($SQLRow = mysqli_fetch_array($SQLResult)) {
            $IdBon = $SQLRow['IdBon'];
            $DateBon = $SQLRow['DateBon'];
            $NumSiretFour = $SQLRow['NumSiretFour'];
            $NomFour = $SQLRow['NomFour'];

            $listeInfoCommande = [
                'IdBon'        => $IdBon,
                'DateBon'      => $DateBon,
                'NumSiretFour' => $NumSiretFour,
                'NomFour'      => $NomFour,
            ];

            $listeCommande['Commande' . $Compteur] = $listeInfoCommande;
            $Compteur++;
        }

        return $listeCommande;
    }

    function GetPastCommandes()
    {
        $idConn = Open_DB();
        $SQLQuery = "
            SELECT bondecommande.IdBon, bondecommande.DateBon, fournisseur.NumSiretFour, fournisseur.NomFour FROM `lignereception` 
            INNER JOIN bondecommande ON bondecommande.IdBon=lignereception.BonIdLig
            INNER JOIN ingredient ON ingredient.IdIng=lignereception.IngIdLig
            INNER JOIN fournisseur ON fournisseur.IdFour=ingredient.FournisseurId
            WHERE lignereception.EtatIdLig=1
            GROUP BY bondecommande.IdBon
            ORDER BY bondecommande.DateBon DESC
        ";
        $SQLResult = mysqli_query($idConn, $SQLQuery);

        $listeCommande = [];
        $Compteur = 1;

        While($SQLRow = mysqli_fetch_array($SQLResult)) {
            $IdBon = $SQLRow['IdBon'];
            $DateBon = $SQLRow['DateBon'];
            $NumSiretFour = $SQLRow['NumSiretFour'];
            $NomFour = $SQLRow['NomFour'];

            $listeInfoCommande = [
                'IdBon'        => $IdBon,
                'DateBon'      => $DateBon,
                'NumSiretFour' => $NumSiretFour,
                'NomFour'      => $NomFour,
            ];

            $listeCommande['Commande' . $Compteur] = $listeInfoCommande;
            $Compteur++;
        }

        return $listeCommande;
    }

    function GetPrevCommandes()
    {
        $idConn = Open_DB();
        $SQLQuery = "
            SELECT bondecommande.IdBon, bondecommande.DateBon, fournisseur.NumSiretFour, fournisseur.NomFour FROM quantitecommandee 
            INNER JOIN bondecommande ON bondecommande.IdBon=quantitecommandee.BondecommandeIdQte
            INNER JOIN ingredient ON ingredient.IdIng=quantitecommandee.IngredientIdQte
            INNER JOIN fournisseur ON fournisseur.IdFour=ingredient.FournisseurId
            WHERE bondecommande.IdBon NOT IN(SELECT lignereception.BonIdLig FROM lignereception)
            GROUP BY bondecommande.IdBon
            ORDER BY bondecommande.DateBon DESC
        ";
        $SQLResult = mysqli_query($idConn, $SQLQuery);

        $listeCommande = [];
        $Compteur = 1;

        While($SQLRow = mysqli_fetch_array($SQLResult)) {
            $IdBon = $SQLRow['IdBon'];
            $DateBon = $SQLRow['DateBon'];
            $NumSiretFour = $SQLRow['NumSiretFour'];
            $NomFour = $SQLRow['NomFour'];

            $listeInfoCommande = [
                'IdBon'        => $IdBon,
                'DateBon'      => $DateBon,
                'NumSiretFour' => $NumSiretFour,
                'NomFour'      => $NomFour,
            ];

            $listeCommande['Commande' . $Compteur] = $listeInfoCommande;
            $Compteur++;
        }

        return $listeCommande;
    }

    #endregion

?>