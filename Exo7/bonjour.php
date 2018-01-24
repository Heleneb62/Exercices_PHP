<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bonjour</title>
  </head>
  <body>
    <?php
    $sexe;
    if (!empty($_POST['sexe']) AND !empty($_POST['nom']) AND !is_numeric($_POST['nom']) AND !is_numeric($_POST['sexe'])) {
    if ($_POST['sexe'] == 'F') {
      echo htmlspecialchars('Bonjour Madame ' . $_POST['nom'] .' !');
    } elseif ($_POST['sexe'] == 'M') {
      echo htmlspecialchars('Bonjour Monsieur '.$_POST['nom'] . ' !');
    } else {
      echo htmlspecialchars('Bonjour M ou Mme ou je sais pas quoi ' . $_POST['nom'] . ' !');
      echo '<br>Merci de préciser la prochaine fois si tu es un mec (M) ou une femme (F) !';
    }
  } else {
    echo 'Remplis bien les informations du formulaire!';
  }
     ?>
  </body>
</html>
