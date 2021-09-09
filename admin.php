<?php
session_start();
include('./script/functions.php');

if(!in_array("ROLE_ADMIN", $_SESSION['user']["role"]))
{
    header("Location: /");
}
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <title>Administration</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Bienvenue sur la page Administrateur</h1>
</div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>