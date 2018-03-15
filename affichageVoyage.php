<?php
	include_once('fonction.php');
	$idConn = Open_DB();
?>

<!DOCTYPE>

</html>
	
	<head>
		<title> Destination </title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="style.css">
   		<?php link_Bootstrap(); ?>
   		<?php link_css(); ?>
	</head>



	<body>
	<!-- Menu -->
	<?php link_menu() ?>

	<div class="voy">
		<p class="textevoyage"> Destination </p>
		<center> <img src="images/voyageacceuil.jpg" class="img_voy"> </center>
	</div>


	<div class="escale">


	<?php

		if(isset($_GET['V']))
		{
			$id=$_GET['V'];
			$idVoy = $_GET['V'];
			$SQLQuery = 'SELECT * FROM voyage ';
			$SQLQuery .= 'INNER JOIN bateau ON bateau_id = voyage_id ';
			$SQLQuery .= 'INNER JOIN escales ON escales_id = voyage_id ';
			$SQLQuery .= "WHERE voyage_id = $idVoy";

			$aff = 'SELECT DISTINCT escales.escales_lieu,escales.escales_id FROM voyage,s_effectue,escales WHERE s_effectue.voyage_id = '.$idVoy.' AND s_effectue.escales_id = escales.escales_id';
			$resu = mysqli_query($idConn,$aff);
			$afff = mysqli_fetch_array($resu);

			$SQLResult = mysqli_query($idConn, $SQLQuery);
			while($SQLRow = mysqli_fetch_array($SQLResult))
			{
				print('<p class="escalevoyage">Voyage destination : '.$SQLRow['voyage_lib'].'</br></br> </p>');
				print('Votre bateau est le : '.$SQLRow['bateau_nom'].' et il est de type : '.$SQLRow['bateau_lib'].'</br>');
				print('De plus, il possède : '.$SQLRow['bateau_nb_cabine'].'</br></br>');
				print('Il a pour evenements : ');
				if ($_GET['V']==1)
				{
					print('</br></br>');
					print("<p> Muse </p> </br>");
					print("<p> Lac des cygnes </p>");
					print('</br></br></br>');
				}
				if ($_GET['V']==2)
				{
					print('</br></br>');
					print("<p> Arlette gruss </p> </br>");
					print("<p> Logan </p>");
				}
				print($SQLRow['voyage_description'].'</br></br>');
				print('Elle contient les escales : ');

			}
			$d = 1;
			while ($afff = mysqli_fetch_array($resu))
			{
				print('</br></br>');
				print('Escale n°'.$d.' est : '.$afff['escales_lieu'].'</br>');
				$d++;
			}
		}
//volier, paquebot, megaship, croisiere cotier

	?>
	</br></br></br></br>
	</div>

	<div class="s">
		<a href="CompteR.php?idvoy=<?php print($id); ?>"> <button class="bouttonFlo" type="button">Reservez Maintenant !</button> </a>
	</div>
	</br></br></br></br>


	<!--footer-->
	<?php link_footer(); ?>
	<!--fin du footer-->
	</body>

</html>