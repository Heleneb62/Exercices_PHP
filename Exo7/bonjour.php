<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bonjour</title>
  </head>
  <body>
    <?php
    $sexe;
    if (!empty($_POST['sexe']) AND !empty($_POST['nom']) AND !is_numeric($_POST['nom'])) {
      echo htmlspecialchars('Bonjour ' .$_POST['sexe'] .' '. $_POST['nom'] .' !');
    }  else {
    echo 'Remplis bien les informations du formulaire!';
  }
     ?>
  </body>
</html>
