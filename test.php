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
        
      

      <?php 
        $txt = "php tests";
        $index = 0;
        $decimal = 15.48;
        $tab = [];
        $tab[] = $txt;
        $tab[] = $index;
        $tab[] = $decimal;
        var_dump($tab); 

      ?>
    

    
    </pre>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
  </body>
</html>