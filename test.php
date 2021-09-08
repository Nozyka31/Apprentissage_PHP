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

    <title>Premier projet</title>
  </head>
  <body>
    
    <?php include("./partial/_navBar.php"); ?>

    <div class="container">
      <h1>Page de test Php</h1>
      <pre>
        
      ===========================================

      <?php 
        
        if($_SESSION['user'])
        {
          echo "Vous êtes connectés.";
        }
        else
        {
          echo "Vous n'êtes pas connectés.";
        }

      ?>
    
    ===========================================

    
    </pre>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>