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
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <title>Premier projet</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Le site d'Arthur Tavernini</h1>
    <span>Bienvenue sur mon site. Il s'agit de mon premier projet PHP.</span><br>
    <span>Retrouver mon travail sur <button class="btn btn-dark mt-3 mb-3"><a href="https://github.com/Nozyka31/Apprentissage_PHP" target="_blank">GitHub</a></button> </span>
</div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>