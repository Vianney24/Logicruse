<?php
    include('fonction.php'); 
    $idConn=Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php 
	link_Bootstrap();
	link_css();
	?>
	<title>Evenement</title>
</head>
<body>
    <!--header-->
        <?php link_menu(); ?>
    <!--fin du header-->
    
    <!--bannière-->
    <div class="banner_evenement">
        <img src="images/img_evenement.jpg">
	    <h2 class="text_banner_evenement">Évênements</h2>
    </div>
    <!--fin bannière-->

    <!--main-->
   	<div class="col-sm-2 nav_evenement">
    	<nav class="nav-sidebar">
			<ul class="nav tabs">
   	       		<li class=""><a href="Evenement.php?tab=1" data-toggle="tab">Musiques</a></li>
   	       		<li class=""><a href="Evenement.php?tab=2" data-toggle="tab">Culturel et touristique</a></li>   
   	       		<li class=""><a href="Evenement.php?tab=3" data-toggle="tab">Films</a></li> 
   	       		<li class=""><a href="Evenement.php?tab=0" data-toggle="tab">Voir tout</a></li>                             
			</ul>
		</nav>
	</div>
	
	<?php
		if($_GET['tab']==1)
		{
			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=1 ORDER BY evenement_id DESC LIMIT 1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$id_max=$SQLRow['evenement_id'];

			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id='.$_GET['tab'];
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$evenement_id=$SQLRow['evenement_id'];
			while ($evenement_id<=$id_max) 
			{
				$script="<div class='evenement'>";
				if ($SQLRow['evenement_lib']=='Concert de Muse')
				{ 
					$script.="<img src='images/logo_muse.jpg' class='col-sm-4'>";
				}
				$script.="<div class='text_evenement col-sm-6'>
							<h3>$SQLRow[evenement_lib]</h3>
							<h5>$SQLRow[evenement_descri]</h5>
							<p>
								Date:
							</p>
							<a href='affichageVoyage.php?V=1' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>
						</div>
					</div>";
				print($script);
				$evenement_id=$evenement_id+1;
			}
		}	
		elseif($_GET['tab']==2)
		{
			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=2 ORDER BY evenement_id DESC LIMIT 1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$id_max=$SQLRow['evenement_id'];

			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id='.$_GET['tab'];
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$evenement_id=$SQLRow['evenement_id'];
			while ($evenement_id<=$id_max) 
			{
				$SQLQuery='SELECT * FROM evenement WHERE evenement_id='.$evenement_id;
				$SQLResult=mysqli_query($idConn,$SQLQuery);
				$SQLRow=mysqli_fetch_array($SQLResult);
				$script="<div class='evenement'>";
				if ($SQLRow['evenement_lib']=='Le Lac des Cygnes') 
				{
					$script.="<img src='images/lac_cygnes.jpg' class='col-sm-4'>";
				}
				elseif ($SQLRow['evenement_lib']=='Cirque Arlette Gruss') 
				{
					$script.="<img src='images/arlette_gruss.jpg' class='col-sm-4'>";
				}
				$script.="<div class='text_evenement col-sm-6'>
						<h3>$SQLRow[evenement_lib]</h3>
						<h5>$SQLRow[evenement_descri]</h5>
						<p>
							Date:
						</p>";
				if ($SQLRow['evenement_lib']=='Le Lac des Cygnes') 
				{
					$script.="<a href='affichageVoyage.php?V=1' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>";
				}
				elseif ($SQLRow['evenement_lib']=='Cirque Arlette Gruss') 
				{
					$script.="<a href='affichageVoyage.php?V=2' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>";
				}
				$script.="</div>
				</div>";
				print($script);
				$evenement_id=$evenement_id+1;
			}
		}		
		elseif($_GET['tab']==3)
		{
			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=3 ORDER BY evenement_id DESC LIMIT 1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$id_max=$SQLRow['evenement_id'];

			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id='.$_GET['tab'];
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$evenement_id=$SQLRow['evenement_id'];
			while ($evenement_id<=$id_max) 
			{
				$SQLQuery='SELECT * FROM evenement WHERE evenement_id='.$evenement_id;
				$SQLResult=mysqli_query($idConn,$SQLQuery);
				$SQLRow=mysqli_fetch_array($SQLResult);
				$script="<div class='evenement'>";
				if ($SQLRow['evenement_lib']=='Logan') 
				{
					$script.="<img src='images/logan.jpg' class='col-sm-4'>";
				}
				$script.="<div class='text_evenement col-sm-6'>
							<h3>$SQLRow[evenement_lib]</h3>
							<h5>$SQLRow[evenement_descri]</h5>
							<p>
								Date:
							</p>
							<a href='affichageVoyage.php?V=2' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>
						</div>
					</div>";
				print($script);
				$evenement_id=$evenement_id+1;
			}
		}
		elseif($_GET['tab']==0)
		{
			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=1 ORDER BY evenement_id DESC LIMIT 1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$id_max=$SQLRow['evenement_id'];

			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$evenement_id=$SQLRow['evenement_id'];
			while ($evenement_id<=$id_max) 
			{
				$script="<div class='evenement'>";
				if ($SQLRow['evenement_lib']=='Concert de Muse')
				{ 
					$script.="<img src='images/logo_muse.jpg' class='col-sm-4'>";
				}
				$script.="<div class='text_evenement col-sm-6'>
							<h3>$SQLRow[evenement_lib]</h3>
							<h5>$SQLRow[evenement_descri]</h5>
							<p>
								Date:
							</p>
							<a href='affichageVoyage.php?V=1' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>
						</div>
					</div>";
				print($script);
				$evenement_id=$evenement_id+1;
			}
			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=2 ORDER BY evenement_id DESC LIMIT 1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$id_max=$SQLRow['evenement_id'];

			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=2';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$evenement_id=$SQLRow['evenement_id'];
			while ($evenement_id<=$id_max) 
			{
				$SQLQuery='SELECT * FROM evenement WHERE evenement_id='.$evenement_id;
				$SQLResult=mysqli_query($idConn,$SQLQuery);
				$SQLRow=mysqli_fetch_array($SQLResult);
				$script="<div class='evenement'>";
				if ($SQLRow['evenement_lib']=='Le Lac des Cygnes') 
				{
					$script.="<img src='images/lac_cygnes.jpg' class='col-sm-4'>";
				}
				elseif ($SQLRow['evenement_lib']=='Cirque Arlette Gruss') 
				{
					$script.="<img src='images/arlette_gruss.jpg' class='col-sm-4'>";
				}
				$script.="<div class='text_evenement col-sm-6'>
						<h3>$SQLRow[evenement_lib]</h3>
						<h5>$SQLRow[evenement_descri]</h5>
						<p>
							Date:
						</p>
						</p>";
				if ($SQLRow['evenement_lib']=='Le Lac des Cygnes') 
				{
					$script.="<a href='affichageVoyage.php?V=1' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>";
				}
				elseif ($SQLRow['evenement_lib']=='Cirque Arlette Gruss') 
				{
					$script.="<a href='affichageVoyage.php?V=2' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>";
				}
				$script.="</div>
					</div>";
				print($script);
				$evenement_id=$evenement_id+1;
			}
			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=3 ORDER BY evenement_id DESC LIMIT 1';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$id_max=$SQLRow['evenement_id'];

			$SQLQuery='SELECT * FROM evenement WHERE type_evenement_id=3';
			$SQLResult=mysqli_query($idConn,$SQLQuery);
			$SQLRow=mysqli_fetch_array($SQLResult);
			$evenement_id=$SQLRow['evenement_id'];
			while ($evenement_id<=$id_max) 
			{
				$SQLQuery='SELECT * FROM evenement WHERE evenement_id='.$evenement_id;
				$SQLResult=mysqli_query($idConn,$SQLQuery);
				$SQLRow=mysqli_fetch_array($SQLResult);
				$script="<div class='evenement'>";
				if ($SQLRow['evenement_lib']=='Logan') 
				{
					$script.="<img src='images/logan.jpg' class='col-sm-4'>";
				}
				$script.="<div class='text_evenement col-sm-6'>
							<h3>$SQLRow[evenement_lib]</h3>
							<h5>$SQLRow[evenement_descri]</h5>
							<p>
								Date:
							</p>
							<a href='affichageVoyage.php?V=2' class='btn btn-default boutton_voy_corresp'>
								<span class='glyphicon glyphicon-hand-right'></span> Voyages correspondants
							</a>
						</div>
					</div>";
				print($script);
				$evenement_id=$evenement_id+1;
			}
		}	
	?>


	<!--footer-->
	<?php link_footer(); ?>
	<!--fin du footer-->
</body>
<?php 
	Close_DB($idConn); 
?>
</html>