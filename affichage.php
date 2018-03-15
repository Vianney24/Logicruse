<?php
 include_once('fonction.php');
 $idConn = Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
<?php link_css(); ?>
	<title></title>
</head>
<body class="backgroundcompte">
<?php
	
		$Sql = 'SELECT * From date';
		$SqlResId = mysqli_query($idConn,$Sql);
		$SqlRowId = mysqli_fetch_array($SqlResId);
		$idDate = $SqlRowId[0];
		mysqli_free_result ($SqlResId);

		$SQLQuery = "INSERT INTO date (date_Generale)
		 VALUES ('2017/02/23')";
		var_dump($SQLQuery);
		mysqli_query($idConn,$SQLQuery);


	$Sql = 'SELECT IFNULL(Max(Client_id),0)+1 From client';
		$SqlResId = mysqli_query($idConn,$Sql);
		$SqlRowId = mysqli_fetch_array($SqlResId);
		$idClient = $SqlRowId[0];
		mysqli_free_result ($SqlResId);
		
		$Nom = $_POST['Nom'];
		$Prenom = $_POST['Prenom'];
		$Identifiant = $_POST['client_login'];
		$Motdepasse = $_POST['password'];
		$DateNaissance = $_POST['datenaissance'];
		$Civilite = $_POST['Civilite'];
		$Mail = $_POST['Mail'];
		$Tel = $_POST['Telephone'];
		$Fax = $_POST['Fax'];
		$Adresse1 = $_POST['Adresse1'];
		$Adresse2 = $_POST['Adresse2'];
		$Ville = $_POST['Ville'];
		$CodePostal = $_POST['Cp'];
		$Pays = $_POST['Pays'];
		
		$SQLQuery = "INSERT INTO client (client_id, client_nom, client_prenom, client_login, client_mdp, civilite_id, client_date_naissance, client_email, client_telephone, client_Fax, client_adresse1, client_adresse2, client_Ville, client_CP, pays_id, date_Generale)
		 VALUES ('$idClient','$Nom','$Prenom','$Identifiant','$Motdepasse','$Civilite','$DateNaissance','$Mail','$Tel','$Fax','$Adresse1','$Adresse2','$Ville','$CodePostal','$Pays', '2017/02/23')";
		var_dump($SQLQuery);
		mysqli_query($idConn,$SQLQuery);
?>
<div class="Formulaire">
<h2> Bonjour vous vous êtes bien inscrit sur le site ! Vous Allez être rediriger dans 5 secondes pour vous connecter ! <meta http-equiv="refresh" content="5; URL=Compte.php"></h2>
</div>
</body>
<?php
	Close_DB($idConn);
?>
</html>
	