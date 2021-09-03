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

<h1>Exercice 6</h1>
       <?php
       $code = hexdec("223a");
       $result = "tout les gagnants ont joué, essayez";
       $response = "";
       if (!empty($_POST)) {
           if ($_POST["try"]) {
               $try = strip_tags($_POST["try"]);
           }
           if (isset($try)) {
               if ($code == $try) {
                   $result = "bien joué, le code est $try";
               } else {
                   $result = "non, le code n'est pas $try";
               }
           }
       }
       // TO DO with while
       $i = 1;
       while($i != $code)
       {
            $i++;
       }
       ?>
       <p>le code à trouver est fixe, tentez votre chance ou faites en sorte que la machine vous aide à trouver la bonne réponse</p>
       <?php if ($response) : ?>
           <p>la réponse est : <?php echo $response; ?></p>
       <?php endif ?>
       <form method="post">
           <div class="form-group">
               <label class="col-form-label" for="try">trouver le code</label>
               <input type="text" class="form-control border border-3" name="try" value="<?php echo $i ?>">
           </div>
           <a href="/exo6.php" class="btn btn-primary mt-3 mb-3">Annuler</a>
           <input type="submit" class="btn btn-primary mt-3 mb-3" value="essayer">
       </form>
       <p><?php echo $result; ?></p>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>