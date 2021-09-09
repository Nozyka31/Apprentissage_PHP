<?php
session_start();
include('./script/functions.php');

if(!empty($_POST))
{
    $securizedDataFromForm = treatFormData(
        $_POST,
        "name",
        "first",
        "email",
        "password",
    );
    extract($securizedDataFromForm, EXTR_OVERWRITE);

    $data = openDB();
    
    $hashPassword = password_hash($password, PASSWORD_ARGON2ID);

    array_push($data['user'], [
        "name" => $name,
        "first" => $first,
        "email" => $email,
        "password" => $hashPassword,
        "role" => ["ROLE_USER"],
    ]);

    writeDB($data);
    header("Location: /connection.php");
}


?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <title>Inscription</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Inscription</h1>

    <form method="post">
            <div class="form-group">
                <label class="col-form-label" for="name">Nom : </label>
                <input type="text" class="form-control border border-3" name="name">
            </div>
            
            <div class="form-group">
                <label class="col-form-label" for="first">Prénom : </label>
                <input type="text" class="form-control border border-3" name="first">
            </div>

            <div class="form-group">
                <label class="col-form-label" for="email">E_mail : </label>
                <input type="mail" class="form-control border border-3" name="email">
            </div>

            <div class="form-group">
                <label class="col-form-label" for="password">Mot de passe : </label>
                <input type="password" class="form-control border border-3" name="password">
            </div>


            <input type="submit" class="btn btn-dark mt-3 mb-3" value="S'inscrire">
        </form>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>