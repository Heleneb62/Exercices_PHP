<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenue!</title>
  </head>
  <body>
    <?php
    if (!empty($_POST['nom']) AND !empty($_POST['age']) AND !is_numeric($_POST['nom']) AND is_numeric($_POST['age'])) {
      echo 'Bonjour ' . $_POST['nom'] . ' ! <br>Tu as ' . $_POST['age'] . ' ans!';
    } else {
      echo 'Il faut que tu donnes ton prénom et ton âge!';
    }
     ?>
  </body>
</html>
