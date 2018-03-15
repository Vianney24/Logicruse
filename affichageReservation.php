<?php
    include('fonction.php'); 
	$idConn=Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logicruse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php link_Bootstrap(); ?>
    <?php link_css(); ?>
</head>
<body class="backgroundcompte">
<!--header-->
    <?php link_menu(); ?>
<!--fin du header-->

			<?php
				$voy=$_GET["id"];
				/*query pour cabine*/				
				
				$SQL="SELECT IFNULL(MAX(cab_id),0)+1 FROM cabine";
				$SQLResId=mysqli_query($idConn,$SQL);
				$SQLRowId=mysqli_fetch_array($SQLResId);
				$cabID=$SQLRowId[0];
				mysqli_free_result($SQLResId);

				$bat=$_POST['nom_bateau'];
				$catplace=$_POST['emplacement'];
				$catclasse=$_POST['classe'];
				$cattype=$_POST['type'];

				$SQLQuery='INSERT INTO cabine(cab_id,cab_prix_de_base,bateau_id,categorie_place_id,categorie_classe_id,categorie_type_id) '; 
				$SQLQuery.="VALUES('$cabID','120','$bat','$catplace','$catclasse','$cattype')";
	
				var_dump($SQLQuery);
				mysqli_query($idConn,$SQLQuery);
				
				/*query pour reservation*/
				
				$SQL="SELECT IFNULL(MAX(res_id),0)+1 FROM reservation";
				$SQLResId=mysqli_query($idConn,$SQL);
				$SQLRowId=mysqli_fetch_array($SQLResId);
				$resID=$SQLRowId[0];
				mysqli_free_result($SQLResId);
				
				$SQLQuery='INSERT INTO reservation(res_id,cab_id,bateau_id,client_id,voyage_id) '; 
				$SQLQuery.="VALUES('$resID','$cabID','$bat','1','$voy')";

				mysqli_query($idConn,$SQLQuery);
				
				
			?>
			<h2>Votre réservation a bien été prise en compte, merci pour votre confiance !</h2>
</body>
</html>
	<?php
	$closeDB=Close_DB($idConn);
?>