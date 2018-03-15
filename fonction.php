<?php
function nav()
{
    $script='
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="informations.php">Informations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="activite.php">Activités</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>';
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

?>