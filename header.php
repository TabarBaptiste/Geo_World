<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?>
<!doctype html>
<html lang="fr" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .img {
      height: 50px;
      width: 50px;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
  <!--Barre-->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <img class="logo" src="images\logoP.png" alt="logo terre">
      <a class="navbar-brand" href="home.php">GeoWorld</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="vertical-line"></div>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <div class="vertical-line"></div>
          <li class="nav-item active">
            <?php
            //Utilise la fonction pour la mise à jour
            
            global $pdo;
            require_once('inc\manager-db.php');
            session_start();
            //Afficher lise des utilisateurs si Admin ou Enseignant conecté
            if (($_SESSION['role'] == 'Admin') || ($_SESSION['role'] == 'Enseignant')): ?>
              <a class="nav-link" href="listeEleves.php">Liste des utilisateurs</a>
            <?php endif; ?>
          </li>
          <div class="vertical-line"></div>
          <!--Dopdown pour les continents-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Continent</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="index.php?cont=North America">North America</a>
              <a class="dropdown-item" href="index.php?cont=South America">South America</a>
              <a class="dropdown-item" href="index.php?cont=Asia">Asia</a>
              <a class="dropdown-item" href="index.php?cont=Africa">Africa</a>
              <a class="dropdown-item" href="index.php?cont=Europe">Europe</a>
              <a class="dropdown-item" href="index.php?cont=Oceania">Oceania</a>
            </div>
          </li>
        </ul>

        <!-- Nom et rôle utilisateur / Déconnecion -->
        <div class="util" style="color: #FFFFFF">
          <?php
          global $pdo;
          require_once('inc\manager-db.php');
          if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            echo "<h5 > Bienvenue: " . $_SESSION['login'] . " / Role: " . $_SESSION['role'] . "</h5>";
            echo '<h5><a href="logout.php">Déconnexion</a></h5>';
          } else {
            header('location: authentificationPays.php');
          }
          ?>
        </div>

        <ul class="navbar-nav ml-auto">
          <!-- Ajouter éleve -->

          <!--<li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation-Atelier-de-Prof-SLAM
          </a>
        </li> -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
          -->
      </div>
    </nav>
  </header>