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
<h1>Exercice 4</h1>
    <h5>1- créer une <a href="https://www.latoilescoute.net/table-de-vigenere" target="_blank">table de vigenère</a></h5>
    <?php
    // TO DO

    //AFFICHAGE D'UNE TABLE DE VIGENERE
    $lettres = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z";
    $tab = explode(" ", $lettres);

    

    for($i = 0; $i < count($tab); $i++)
    {
      $a = 0;
      $b = 0;
      for($j = 0; $j < count($tab); $j++)
      {
        if($j + $i < 26)
        {
          echo $tab[$j + $i];
        }
        else{
          echo $tab[$a + $b];
          $a++;
        }
        if ($j < 25)echo " _ ";
      };
      $b++;
      echo nl2br("\n");
    };

//CREATION D'UNE TABLE DE VIGENERE
$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$alphTab = str_split($alphabet);
$alphTab2 = array_merge($alphTab, $alphTab);

for($i = 0; $i < count($alphTab); $i++) {
  for($j = 0; $j < count($alphTab); $j++) {
    $line = $alphTab[$i];
    $column = $alphTab[$j];
    $vigenere[$line][$column] = $alphTab2[$i + $j];
  }
}

var_dump($vigenere)

    ?>
    <h5>2- encode le message "APPRENDRE PHP EST UNE CHOSE FORMIDABLE" avec la clé "BACKEND"</h5>
    <?php
    $message = "APPRENDRE PHP EST UNE CHOSE FORMIDABLE";
    $key = "BACKEND";
    // TO DO
    $cryptedMessage = $message;
    /**
    * astuce pour la rotation de la clé BACKEND
    * 14 / 7 -> 2
    * 15 / 7 -> 2 reste 1
    * pour récuperer le "reste 1" il faut faire un modulo
    * 15 % 7 -> 1
    * 176 % 7 -> 1 (25 x 7 et reste 1)
    */
    ?>
    <p>le message est: <?php echo $message; ?></p>
    <p>la clé est: <?php echo $key ?></p>
    <p>le résultat est: <?php echo $cryptedMessage; ?></p>
    <h5>3- decoder le message "TWA PEE WM TESLH WL LSLVNMRJ" avec la clé "VIGENERE"</h5>
    <?php
    $encodedMessage = "TWA PEE WM TESLH WL LSLVNMRJ";
    $key4decode = "VIGENERE";
    // TO DO
    $decodedMessage = $encodedMessage;
    ?>
    <p>le message chiffré est: <?php echo $encodedMessage; ?></p>
    <p>la clé est: <?php echo $key4decode ?></p>
    <p>le résultat est: <?php echo $decodedMessage; ?></p>
</div>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>