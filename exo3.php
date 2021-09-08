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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <title>Premier projet</title>
  </head>
  <body>
    <?php include("./partial/_navBar.php"); ?>

<div class="container">
<h1>Exercice 3</h1>
        <?php
        $tab1 = ["moteur", "carotte", "haricot", "pomme de terre", "usine", "salade", "navet", "marteau"];
        ?>
        <p>voici les éléments du tableau de base:
        <ul>
            <li><?php echo $tab1[0]; ?></li>
            <li><?php echo $tab1[1]; ?></li>
            <li><?php echo $tab1[2]; ?></li>
            <li><?php echo $tab1[3]; ?></li>
            <li><?php echo $tab1[4]; ?></li>
            <li><?php echo $tab1[5]; ?></li>
            <li><?php echo $tab1[6]; ?></li>
            <li><?php echo $tab1[7]; ?></li>
        </ul>
        </p>
        <h3>Premier exercice:</h3>
        <p>retirer les 3 intrus: et afficher les valeurs</p>
        <p>résultat:
            <?php
            // TO DO
            array_splice($tab1, 4, 1);
            array_shift($tab1);
            array_pop($tab1);

            ?>
        <ul>
            <li><?php echo $tab1[0]; ?></li>
            <li><?php echo $tab1[1]; ?></li>
            <li><?php echo $tab1[2]; ?></li>
            <li><?php echo $tab1[3]; ?></li>
            <li><?php echo $tab1[4]; ?></li>
        </ul>
        </p>
        <h3>Second exercice:</h3>
        <p>transformer la chaîne de caractère "bleu, vert, noir, rouge, jaune" en un tableau</p>
        <p>ajouter en première position du tableau la valeur "violet"</p>
        <p>résultat:
            <?php
            // TO DO
            $txt = "bleu vert noir rouge jaune";
            $tab2 = explode(" ", $txt);
            array_unshift($tab2, "violet");

            ?>
            <ul>
                <li><?php  echo $tab2[0]; 
                    ?></li>
                <li><?php  echo $tab2[1]; 
                    ?></li>
                <li><?php  echo $tab2[2]; 
                    ?></li>
                <li><?php  echo $tab2[3]; 
                    ?></li>
                <li><?php  echo $tab2[4]; 
                    ?></li>
                <li><?php  echo $tab2[5]; 
                    ?></li>
            </ul>
        </p>
</div>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>