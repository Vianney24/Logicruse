<?php include_once('fonction.php');
$idConn = Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Compte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php link_Bootstrap(); ?>
    <?php 
    link_css();
	?>
</head>
<body class="backgroundcompte">
	<div class="container-fluid">

        <!--header-->
            <?php link_menu();?>
        <!--fin du header-->
    </div>
    <br><br>
	<div class="Login">
	<?php
		$SQLQuery = 'SELECT * FROM client';
        $SqlResult = mysqli_query($idConn,$SQLQuery);
        ($SqlRow= mysqli_fetch_array($SqlResult));
		print('
		<form class="form-inline" action="Compte.php?id='.$SqlRow['client_id'].'" method="post">
			<p> Connectez-Vous !</p>
	 		<div class="input-group">
  				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    			<input id="login" type="text" class="form-control" name="login" placeholder="Identifiant" required>
  			</div><br><br>
	 		<div class="input-group">
   				 <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    			<input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
 			</div><br><br>');
          
         
	  			print('<button type="submit" name="submit" class="btn btn-default">Connexion</button>
		</form>
	  			<a href="Register.php"><button type="submit" class="btn btn-default"> Création de compte</button></a>
	  			<p> Mot de passe oublié ? </p>	
    ');
    

	  		$db = mysqli_connect('localhost', 'root', ''); 
			  mysqli_select_db($db,'ppe_site');
		
			  if(isset($_POST['login']) && isset($_POST['password'])) {
  				

  			$login = $_POST["login"];
			  $password = $_POST["password"];

  				// on recupére le password de la table qui correspond au login du visiteur
  				$sql = "SELECT client_mdp from client where client_login ='".$login."'";
  				$req = mysqli_query($idConn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

 			  $data = mysqli_fetch_assoc($req);

  			if($data['client_mdp'] != $password) {
    			echo '<div class="alert alert-dismissable alert-danger">
  				<button type="button" class="close" data-dismiss="alert">x</button>
  				<strong>Oh Non !</strong> Mauvais login / password. Merci de recommencer !
				</div>';
 			  }
  
 			else {
   			$_SESSION['login'] = $login;
			$SQLQuery = 'SELECT * FROM client ';
			$SqlResult = mysqli_query($idConn,$SQLQuery);
			($SqlRow= mysqli_fetch_array($SqlResult));
			
   			echo '<div class="alert alert-dismissable alert-success">
  				<button type="button" class="close" data-dismiss="alert">×</button>
 				<strong>Yes !</strong> <p> Vous etes bien logué, Redirection dans 5 secondes ! <meta http-equiv="refresh" content="5" URL="Index.php?idp='.($_GET["id"]).'"> </p>
				</div>';
          }    
        }
       else {
        $champs = '<p><b>(Remplissez tous les champs pour vous connectez !)</b></p>';
      }

    ?>



		
	</div>
	
</body>
</html>