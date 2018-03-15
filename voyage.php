<?php
	include_once('fonction.php');

	$idConn = Open_DB();
?>

<!DOCTYPE>

</html>
	
	<head>
		<title> Voyage </title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   		<?php link_Bootstrap(); ?>
   		<?php link_css(); ?>
	</head>



	<body>
	<!-- Menu -->
	<?php link_menu() ?>

	<div class="voy">
		<p class="textevoyage"> Espace Voyage </p>
		<center> <img src="images/voyageacceuil.jpg" class="img_voy"> </center>
	</div>


	<?php
		$idVoy = ['V'];
	?>

	<div>
		<?php
			$SQLQuery = 'SELECT * FROM Voyage WHERE voyage_id = 1';
			$SQLResult = mysqli_query($idConn, $SQLQuery);
			$SQLRow = mysqli_fetch_array($SQLResult);
			$script = '<a href="affichageVoyage.php?V='.$SQLRow['voyage_id'].'"> <button type="button" class="col-lg-offset-1 col-lg-2" class="btn btn-sm btn-warning">Caraïbes</button> </a>';

			print($script);
			
			$SQLQuery = 'SELECT * FROM Voyage WHERE voyage_id = 2';
			$SQLResult = mysqli_query($idConn, $SQLQuery);
			$SQLRow = mysqli_fetch_array($SQLResult);
			$script = '<a href="affichageVoyage.php?V='.$SQLRow['voyage_id'].'"> <button type="button" class="col-lg-offset-1 col-lg-2" class="btn btn-sm btn-warning">Dubaî</button> </a>';

			print($script);
		?>
	</div>




	<!--footer-->
	<?php link_footer(); ?>
	<!--fin du footer-->
	</body>

</html>