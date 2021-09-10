<?php
session_start();
include('./script/functions.php');

$userMAIL = $_SESSION["user"]['email'];

$data = openDB();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if($_POST['password'] === "")
    {
        unset($_POST['password']);
    }

    foreach($data["user"] as $user)
    {
        if($user['email'] === $userMAIL)
        {
            updateUser($_POST, $user['index']);
        }
    }

    header("Location: /account.php");
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

    <title>Modifier mon compte</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Modifier mon compte</h1>    

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-form-label" for="name">Nom : </label>
            <input type="text" class="form-control border border-3" name="name" value="<?php echo $_SESSION['user']['name'] ?>">
        </div>
        
        <div class="form-group">
            <label class="col-form-label" for="first">Prénom : </label>
            <input type="text" class="form-control border border-3" name="first" value="<?php echo $_SESSION['user']['first'] ?>">
        </div>

        <div class="form-group">
            <label class="col-form-label" for="email">E_mail : </label>
            <input type="mail" class="form-control border border-3" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
        </div>

        <div class="form-group">
            <label class="col-form-label" for="password">Mot de passe : </label>
            <input type="password" class="form-control border border-3" name="password" placeholder="Laisser vide si vous ne voullez pas modifier votre mot de passe">
        </div>

        <div class="form-group">
            <label class="col-form-label" for="photo">Votre photo de profil : </label>
            <input type="file" class="form-control border border-3" name="photo">
        </div>   

        <input type="submit" class="btn btn-dark mt-3 mb-3" value="Mettre à jour">
    </form>


</div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>