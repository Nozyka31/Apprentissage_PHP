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

      <?php 
        
        if(!empty($_POST))
        {
          $file = $_FILES['path'];
          $fileOnServer = $file['tmp_name'];
          $autorizedMime = [
            "image/jpeg", "image/jpg", "image/gif", "image/png"
          ];

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
              $message = "Echec de l'upload du fichier.";
            }
            else
            {
              $message = "Fichier uploadé avec succès!";
              echo $destination;
            }
        }
      }
      ?>
      
      <?php echo "Photo dans le json : ", $_SESSION['user']['photo']; ?>
      <?php echo "Destination : ", $destination ?>

      ===========================================

      </pre>
      
      <?php if($errorMessage) : ?>

        <p><?php echo $errorMessage; ?></p>

      <?php endif ?>

      <?php if($message) : ?>

        <p><?php echo $message; ?></p>

      <?php endif ?>

      <span>Envie de m'envoyer une petite image?</span>

      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-form-label" for="path">Votre fichier : </label>
            <input type="file" class="form-control border border-3" name="path">
        </div>    
        <input type="submit" name="submit" class="btn btn-dark mt-3 mb-3" value="Uploader">
      </form>
    
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>