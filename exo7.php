<?php
session_start();
include('./script/functions.php');
require("./script/cryptage.php");
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <title>Premier projet</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
    <h1>Exercice 7</h1>

    <?php 
    if(!empty($_POST))
    {
        if($_POST["message"])
        {
            $message = strip_tags($_POST["message"]);
        }
        if($_POST["key"])
        {
            $key = strip_tags($_POST["key"]);
        }

        if(!$key && $message){
            $errorMessage = "Vous devez rentrer la clé";
        }
        elseif (!$message && $key) {
            $errorMessage = "Vous devez rentrer le message";
        }

        if((!$errorMessage) && (strip_tags($_POST["encodage"]) == "encoderVigenere"))
        {
            $result = vigenereCode($message, $key);
        }
        else if((!$errorMessage) &&  (strip_tags($_POST["encodage"]) == "decoderVigenere"))
        {
            $result = vigenereDecode($message, $key);
        }
        else if((!$errorMessage) &&  (strip_tags($_POST["encodage"]) == "encoderCesar"))
        {
            $result = cesarCode($message);
        }
        else if((!$errorMessage) &&  (strip_tags($_POST["encodage"]) == "decoderCesar"))
        {
            $result = cesarDecode($message);
        }
    }
    
    ?>

    <?php if($errorMessage && strip_tags($_POST["key"])) : ?>

    <div class=" alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Attention!</h4>
        <p class="mb-0"><?php echo $errorMessage?></p>
    </div>

    <?php endif ?>

    
    <h3>Système d'encodage de vigenère</h3>

        <form method="post">
            <div class="form-group">
                <label for="message">MESSAGE</label>
                <textarea name="message" class="form-control border border-3" rows="2"><?php echo $message; ?></textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="key">LA CLE</label>
                <input type="text" class="form-control border border-3" name="key" value="<?php echo $key; ?>">
            </div>
            <div class="form-group">
                <label for="encodage">Choisis ton système d'encodage :</label>

                <select name="encodage" class="form-control border border-3">
                    <option value="">--Please choose an option--</option>
                    <option value="encoderVigenere">Encodage par Vigenere</option>
                    <option value="decoderVigenere">Decodage par Vigenere</option>
                    <option value="encoderCesar">Encodage par Cesar</option>
                    <option value="decoderCesar">Decodage par Cesar</option>
                </select>    
            </div>
            <a href="/exo5.php" class="btn btn-dark mt-3 mb-3">Annuler</a>
            <input type="submit" class="btn btn-dark mt-3 mb-3" value="Encoder">
        </form>
    </div>

    <?php echo $result ?>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>