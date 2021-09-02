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
    <h1>Exercice 2</h1>
        <h3>Décoder des messages</h3>
        <p>les messages à décoder</p>
        <?php
        $message1 = "0@sn9sirppa@#?ia'jgtvryko1";
        $message2 = "q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj";
        $message3 = "aopi?sgnirts@#?sedhtg+p9l!";
        ?>
        <ul>
            <li>message 1 : <?php echo $message1; ?></li>
            <li>message 2 : <?php echo $message2; ?></li>
            <li>message 3 : <?php echo $message3; ?></li>
        </ul>
        <p>comment proceder?</p>
        <ol>
            <li>Calculer la longueur de la chaîne et la diviser par 2, tu obtiendras ainsi le "chiffre-clé".</li>
            <li>Récupère ensuite la <a href="https://www.php.net/manual/fr/function.substr.php">sous-chaîne</a> de la longueur du chiffre-clé en commençant à partir du 6ème caractère.</li>
            <li>Remplace les chaînes '@#?' par un espace.</li>
            <li>Pour finir, inverse la chaîne de caractères.</li>
        </ol>
        <?php
        /**
         * pour la division, un code à tester:
         * $number = 50;
         * $result = 50 / 2;
         * echo $result;
         */
        // TO DO
        $keyCodeMessage1 = strlen($message1)/2;
        $subStrMessage1 = substr($message1, 5, $keyCodeMessage1);
        $subStrMessage1 = strrev(str_replace("@#?", " ", $subStrMessage1));
        $decodedMessage1 = $subStrMessage1;
        // TO DO
        $keyCodeMessage2 = strlen($message2)/2;
        $subStrMessage2 = substr($message2, 5, $keyCodeMessage2);
        $subStrMessage2 = strrev(str_replace("@#?", " ", $subStrMessage2));
        $decodedMessage2 = $subStrMessage2;
        // TO DO
        $keyCodeMessage3 = strlen($message3)/2;
        $subStrMessage3 = substr($message3, 5, $keyCodeMessage3);
        $subStrMessage3 = strrev(str_replace("@#?", " ", $subStrMessage3));
        $decodedMessage3 = $subStrMessage3;
        ?>
        <p>résultats:</p>
        <p>message1: <?php echo $decodedMessage1 ?><br>
            message2: <?php echo $decodedMessage2 ?><br>
            message3: <?php echo $decodedMessage3 ?><br>
        </p>
    </div>

    

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>