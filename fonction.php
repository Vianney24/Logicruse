<?php

/*fonction bootstrap*/
    function link_Bootstrap(){
        $script='<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />
                <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
                <link rel="stylesheet" href="bootstrap/js/bootstrap.js" />
                <link rel="stylesheet" href="bootstrap/js/jquery-3.1.1.js" />';
        print($script);
    }

/*fonction menu*/
function link_menu(){
    $script='<header>';
        $script.='<div class="container content">';
            $script.='<div class="logo col-sm-3">';
            	$script.='<a href="index.php">';
                $script.='<img src="images/logo.jpg">';
            	$script.='</a>';
        	$script.='</div>';
            $script.='<div class="row col-sm-9">';
                $script.='<div class="btn-group btn-group-justified">';
                    $script.='<div class="btn-group">';
                        $script.='<a href="index.php">';
                            $script.='<button type="button" class="btn btn-nav">';
                                $script.='<span class="glyphicon glyphicon-home"></span>';
                                $script.='<p>Accueil</p>';
                            $script.='</button>';
                        $script.='</a>';
                    $script.='</div>';
                    $script.='<div class="btn-group">';
                        $script.='<a href="Evenement.php?tab=0">';
                            $script.='<button type="button" class="btn btn-nav">';
                                $script.='<span class="glyphicon glyphicon-bell"></span>';
                                $script.='<p>Évènements</p>';
                            $script.='</button>';
                        $script.='</a>';
                    $script.='</div>';
                    $script.='<div class="btn-group">';
                        $script.='<a href="voyage.php">';
                                $script.='<button type="button" class="btn btn-nav">';
                                    $script.='<span class="glyphicon glyphicon-globe"></span>';
                                    $script.='<p>Voyages</p>';
                                $script.='</button>';
                        $script.='</a>';
                    $script.='</div>';
                    $script.='<div class="btn-group">';
                        $script.='<a href="Compte.php">';
                                $script.='<button type="button" class="btn btn-nav">';
                                    $script.='<span class="glyphicon glyphicon-user"></span>';
                                    $script.='<p>Mon compte</p>';
                                $script.='</button>';
                        $script.='</a>';    
                    $script.='</div>';
                $script.='</div>';
        $script.='</div>';
    $script.='</header>';
    print($script);
}

/*fonction style css*/
function link_css(){
    $script='<link rel="stylesheet" type="text/css" href="style.css">';
    print($script);
}

function link_footer(){
	$script='<div class="pied_de_page">
				<p>© Logicruse. Tout droit réservés.</p>
			</div>';
	print($script);
}

/*fonction ouverture base de données*/
    function Open_DB(){
        /*Connection base de données*/
            $server='localhost';
            $user='root';
            $pass='';
            $nom_data_base='ppe_site';
        //Ouverture de la connection
            $idConn= mysqli_connect ($server,$user,$pass);
        //Selection de la base de donnée    
            mysqli_select_db($idConn,$nom_data_base);
            return $idConn;
    }

/*fonction fermeture base de données*/
    function Close_DB($idConn){
        mysqli_close($idConn);
    }


