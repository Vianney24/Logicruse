<?php include_once('fonction.php');
		$idConn=Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Réservation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php link_Bootstrap(); ?>
    <?php link_css(); ?>
</head>
<body class="backgroundcompte">
<div class="container-fluid">
	<!--header-->
    	<?php link_menu(); ?>
    <!--fin du header-->

    <!--formulaire dde contact-->
		<div class="FormulaireRes">
			<?php
							$id=$_GET["id"];
			?>
			<form class="form-inline" action="affichageReservation.php?id=<?php print($id); ?>" method="post">
				<h2 class="enteteformulaire"> Réservation </h2>
				<p class="enteteformulaire"> Votre voyage Bernard! <p>
				<br>
				<h3 class="enteteformulaire">Infos Voyage </h3>
	      		<div class="row">
	      			<div  class="col-xs-6 col-md-4">
	      				<p>Destination: </p>
						<p>  
							<?php
							$SQLQuery = "SELECT * FROM voyage WHERE voyage_id='$id'";
							$SQLResult = mysqli_query($idConn,$SQLQuery);
							$SQLRow =  mysqli_fetch_array($SQLResult);
						
							print($SQLRow['voyage_lib']);
							?>						</p>
		  				<br>
		  				<br>
					</div>
					<div class="col-xs-6 col-md-4">
		      			<span>Date de départ</span><br>
		        			<input type="date" name="date_depart" class="form-control">
						<br>
						<br>
						<span>Date d'arrivé</span><br>
		        			<input type="date" name="date_arrive" class="form-control" disabled>
		      		</div>
	      			<br>
	  				<div class="col-xs-6 col-md-4">
				     	<p class="positionContact">Navire: </p>
				  		<div class="form-group">
				    		<select name="nom_bateau">
							<?php
							$SQLQuery = "SELECT DISTINCT bateau.bateau_nom,bateau.bateau_nb_cabine,bateau.bateau_id FROM bateau,s_effectue WHERE s_effectue.voyage_id='$id' and s_effectue.bateau_id=bateau.bateau_id ";
							$SQLResult = mysqli_query($idConn,$SQLQuery);
							while ($SQLRow =  mysqli_fetch_array($SQLResult))
								{
								print('<option value="'.$SQLRow['bateau_id'].'">'.$SQLRow['bateau_nom'].' -- '.$SQLRow['bateau_nb_cabine'].' cabines</option>');
								}
							?>
							</select>
				  		</div>
				    </div>
					</div>
					<div class="row">
					<h3 class="enteteformulaire"> Cabine </h3>
					<br>
			      	<div class="col-xs-6 col-md-4">
			      		<p class="positionLieu"> Type : 
			  			<div class="form-group">
			    			<select name="type">
								<option value="1"> Simple </option>
								<option value="2"> Double </option>
							</select>
						</p>							
			  			</div>
			  			<br>
			  			<br>
					</div>
					<div class="col-xs-6 col-md-4">
						<p class="positionLieu"> Classe :
			  			<div class="form-group">
			    			<select name="classe">
								<option value="1"> Supérieur </option>
								<option value="2"> Deluxe </option>
								<option value="3"> Prestige </option>
								<option value="4"> Grand deluxe </option>
								<option value="5"> Privilège </option>
							</select>	
						</p>
			  			</div>
					</div>
					<div class="col-xs-6 col-md-4">
						<p class="positionLieu"> Emplacement :
			  			<div class="form-group">
			    			<select name="emplacement">
								<option value="1"> Interieur </option>
								<option value="2"> Vue avec hublot </option>
								<option value="3"> Balcon </option>
							</select>	
						</p>
			  			</div>
					</div>
	      			</div>
	      			<input type="submit" value="Valider" class="btn btn-primary validation"  />
					</div>
	    	</form> 
		</div>
		</div>
	<!--fin du formulaire de contact-->

</body>
</html>

	<?php
	$closeDB=Close_DB($idConn);
?>