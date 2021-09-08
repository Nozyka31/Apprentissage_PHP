<?php
session_start();
include('./script/functions.php')
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <title>Premier projet</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Les exercices</h1>

    <button class="btn btn-dark mt-3 mb-3"><a href="https://github.com/Nozyka31/Apprentissage_PHP">Mon GitHub</a></button>

    <h2>les exercices en php</h2>
    <ol>
        <li>
            <span>Premier exercice</span>
        </li>
        <li>
          <span><button class="btn btn-dark mt-3 mb-3"><a href="exo2.php">Exercice 2 </a></button> Décoder des chaines de caractère</span>
        </li>
        <li>
          <span><button class="btn btn-dark mt-3 mb-3"><a href="exo3.php">Exercice 3 </a></button> Travailler avec les tableaux</span>
        </li>
        <li>
          <span><button class="btn btn-dark mt-3 mb-3"><a href="exo4.php">Exercice 4 </a></button> Travailler avec les boucles</span>
        </li>
        <li>
          <span><button class="btn btn-dark mt-3 mb-3"><a href="exo5.php">Exercice 5 </a></button> Les formulaires</span>
        </li>
        <li>
          <span><button class="btn btn-dark mt-3 mb-3"><a href="exo6.php">Exercice 6 </a></button> Les boucles while</span>
        </li>
        <li>
          <span><button class="btn btn-dark mt-3 mb-3"><a href="exo7.php">Exercice 7 </a></button> On nettoie tout ça</span>
        </li>
    </ol>
</div>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>