<?php include_once('fonction.php');
$idConn = Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Création de compte</title>
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
		<div class="Formulaire">
			<form class="form-inline" action="affichage.php" method="post">
				<h3 class="enteteformulaire"> Inscription </h3>
	      		<div class="row">
	      			<div  class="col-xs-6 col-md-4">
	      				<p> Identité : </p>
		 		  		<div class="form-group">
	    					<input id="Nom" type="text" class="form-control" name="Nom" placeholder="Nom" required>
	  					</div>
		  				<br>
		  				<br>
		  				<div class="form-group">
		    				<input id="Prenom" type="text" class="form-control" name="Prenom" placeholder="Prenom" required>
		  				</div>
		  				<br>
		  				<br>
		  				<div class="form-group"> 
		    				<input id="login" type="text" class="form-control" name="client_login" placeholder="Identifiant" required>
		  				</div>
		  				<br>
		  				<br>
		        		<div class="form-group">
		          			<input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
		        		</div>
		      			<div class="dateform" required><br>
		      				<span>Date de naissance</span><br>
		        			<input type="date" id="datenaissance" name="datenaissance" class="form-control">
		      			</div>
		      			<br>
		      			<div class="positionCiv" required>
		      				<label> Civilite </label><br>
		      					<input type= "radio" name="Civilite" value="1"> H 
								<input type= "radio" name="Civilite" value="2"> F
		      			</div>
	      			</div>
	      			<br>
	  				<div class="col-xs-6 col-md-4">
				     	<p class="positionContact"> Contact : </p>
				  		<div class="form-group">
				    		<input id="Mail" type="text" class="form-control" name="Mail" placeholder="E-mail" required>
				  		</div>
				  		<br>
				  		<br>
				  		<div class="form-group">
				    		<input id="Telephone" type="text" class="form-control" name="Telephone" placeholder="Numéro de téléphone" required>
				  		</div>
				  		<br>
				  		<br>
				  		<div class="form-group">
				    		<input id="Fax" type="text" class="form-control" name="Fax" placeholder="Fax">
				  		</div>
				  		<br>
				  		<br>
				  		<div class="form-group">
				    		<input id="Adresse1" type="text" class="form-control" name="Adresse1" placeholder="Adresse ligne 1" required>
				  		</div>
				  		<br>
				  		<br>
				  		<div class="form-group">
				    		<input id="Adresse2" type="text" class="form-control" name="Adresse2" placeholder="Adresse ligne 2">
				  		</div>
				  		<br>
				  		<br>
				    </div>
			      	<div class="col-xs-6 col-md-4">
			      		<p class="positionLieu"> Lieu : </p>
			      		<div class="form-group">
			      			<p> Pays :
			    			<SELECT name="Pays" required>
			    				<option value="1"> Danemark </option>
			    				<option value="2"> Espagne </option>
			    				<option value="3"> France </option>
			    				<option value="4"> Italy </option>
			    				<option value="5"> Royaume-Uni </option>
			    			</SELECT></p>
			  			</div>
			  			<div class="form-group"><br>
			    			<input id="Ville" type="text" class="form-control" name="Ville" placeholder="Ville" required>
			  			</div>
			  			<br>
			  			<br>
			  			<div class="form-group">
			    			<input id="Cp" type="text" class="form-control" name="Cp" placeholder="Code Postal" required>
			  			</div>
			  			<br>
			  			<br>
	      			</div>
	      			<input type="submit" value="Création de compte" class="btn btn-primary validation" />
	    	</form> 
		</div>
<?php
		//Connexion à la BDD
		  try
		  {
		   $bdd = new PDO('mysql:host=localhost;dbname=ppe_site', 'root', '');
		  }
		  
		  catch(Exception $e)
		  {
		   die('Erreur :'.$e->getMessage());
		  }
		  
	if(ISSET($_POST['submit']))
	{
		
		
		//On créer les variables
		$login =   $_POST['login'];
		$password = $_POST['password'];
		$password = hash("sha256", $password);
		header("Location: Index.php?id=".$_SESSION['client_id']);
		
		
		
		
		$req = $bdd->prepare('INSERT INTO client(client_login, client_mdp) VALUES ($login, $password)');
		
		
		$req->execute(array("login" => $login, "password" => $password));
		
		
		if(!empty($login) && !empty($password))
		{
		
		}else{
		?>
		
		
		<b>Pseudo ou MDP vide !</b>
		
		
		<?php
		}
		
		
		if(empty($login) && empty($password))
		{
		
		
		}else{
		
		
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: Index.php');
		
		
		}
		
		
	}
   
?>
	<!--fin du formulaire de contact-->

</body>
</html>