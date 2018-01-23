<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bonjour</title>
  </head>
  <body>
    <?php
    $sexe;
    if ($_POST['sexe'] == 'F') {
      echo 'Bonjour Madame ' . $_POST['nom'] .' !';
    } elseif ($_POST['sexe'] == 'M') {
      echo 'Bonjour Monsieur '.$_POST['nom'] . ' !';
    } else {
      echo 'Bonjour M ou Mme ou je sais pas quoi ' . $_POST['nom'] . ' !';
    }
     ?>
  </body>
</html>
