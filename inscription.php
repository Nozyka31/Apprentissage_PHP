<?php
session_start();
include('./script/functions.php');

if(!empty($_POST))
{
    $file = $_FILES['photo'];
    $fileOnServer = $file['tmp_name'];
    $autorizedMime = [
    "image/jpeg", "image/jpg", "image/gif", "image/png"
    ];

    if($_POST['photo'])
    {
        //Test mime type
        $testMime = mime_content_type($fileOnServer);
        if(!in_array($testMime, $autorizedMime))
        {
        $errorMessage = "Le type du fichier n'est pas reconnu. Veuillez uploader une image.";
        }

        //Test if the file is uploaded
        if(!is_uploaded_file($fileOnServer))
        {
        $errorMessage = "Le fichier ne s'est pas upload correctement";
        }

        //Test the size of the file
        $fileSize = filesize($fileOnServer);
        if($fileSize > 1000000)
        {
        $errorMessage = "Le fichier est trop volumineux";
        }

        if(!$errorMessage)
        {
            $originalFileName = basename($file['name']);
            $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $mainName = pathinfo($originalFileName, PATHINFO_FILENAME);
            $tmpCleanedName = preg_replace("/\s/", "-", $mainName);
            $cleanedName = trim($tmpCleanedName, "-");
            $finalName = $cleanedName . uniqid() . '.' . $ext;
            $destination = UPLOADFOLDER . $finalName;
            $sucessUpload = move_uploaded_file($fileOnServer, $destination);
            if(!$sucessUpload)
            {
                $message = "Fichier uploadé avec succès!";
            }
            else
            {
                $message = "Echec de l'upload du fichier.";
            }
        }
    }


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

    $index = 0;
    foreach($data['user'] as $user)
    {
        if($securizedDataFromForm["email"] == $user['email'])
        {
            $errorMessage = "Cette adresse email est déjà utilisée. Veuillez en choisir une autre.";
        }
        $index++;
    }
    
    array_push($data['user'], [
        "name" => $name,
        "first" => $first,
        "email" => $email,
        "password" => $hashPassword,
        "photo" => $finalName,
        "role" => ["ROLE_USER"],
        "index" => $index,
    ]);

    if(!$errorMessage)
    {
        writeDB($data);
        header("Location: /connection.php");
    }
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

    <?php if($errorMessage) : ?>

    <p><?php echo $errorMessage; ?></p>

    <?php endif ?>

    <?php if($message) : ?>

    <p><?php echo $message; ?></p>

    <?php endif ?>

    <form method="post" enctype="multipart/form-data">
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
                <input type="mail" class="form-control border border-3" name="email" required>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="password">Mot de passe : </label>
                <input type="password" class="form-control border border-3" name="password" required>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="photo">Votre photo de profil : </label>
                <input type="file" class="form-control border border-3" name="photo">
            </div>   

            <input type="submit" name ="submit" class="btn btn-dark mt-3 mb-3" value="S'inscrire">
        </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>