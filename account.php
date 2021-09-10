<?php
session_start();
include('./script/functions.php');

if(!$_SESSION['user'])
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

    <title>Compte</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Mon compte</h1>

    <?php if($_SESSION['user']) : ?>

      <div class="card" style="width: 18rem;">
        <?php if(empty($_SESSION['user']['photo'])) : ?>
          <img class="card-img-top" src="./assets/img/no_photo.png" alt="Card image cap">
        <?php else : ?>
          <img class="card-img-top" src="assets\img\upload\<?php echo $_SESSION['user']['photo']?>" alt="Card image cap">
        <?php endif ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo $_SESSION['user']['first'], " ", $_SESSION['user']['name']; ?></h5>
          <p class="card-text"><?php echo "Email : ", $_SESSION['user']['email']?></p>
        <a href="editAccount.php" class="btn btn-dark">Modifier mes informations</a>
        </div>
      </div>
    
    <?php endif ?>
</div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>