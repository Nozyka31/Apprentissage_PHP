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
        
        if(in_array("ROLE_ADMIN", $_SESSION['user']['role']))
        {
          echo "Bonjour ", $_SESSION['user']['first'], " ", $_SESSION['user']['name'], ". Vous êtes administrateur de ce site.";
        }
        else
        { 
          ?> <img src="assets/img/user.jpg" alt=""> 
          <br><span>Si jamais vous êtes intéressés par un rôle d'administrateur, n'hésitez pas à me contacter sur Discord !</span>
          <?php
        }

      ?>
    
      ===========================================

    
    </pre>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>