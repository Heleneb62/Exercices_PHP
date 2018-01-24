<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exo7</title>
  </head>
  <body>
    <?php
      if (!isset($_POST['sexe']) AND !isset($_POST['nom'])) { ?>
      <form action="" method="post">
      <h1>Formulaire de la mort</h1>
      <p>
      Ton nom de famille:  <input name="nom" type="text" /><br>
      Tu es:
      <label for="sexe">Un homme<input id="sexe" name="sexe" type="radio" value="Monsieur" /></label>
      <label for="sexe">Une femme<input id="sexe" name="sexe" type="radio" value="Madame" /></label><br><br>
        <input type="submit" value="Valider"/>
      </p>
      </form>
    <?php   } ?>
    <?php
      if (isset($_POST['sexe']) OR isset($_POST['nom'])) {
        if (!empty($_POST['sexe']) AND !empty($_POST['nom']) AND !is_numeric($_POST['nom'])) {
          echo htmlspecialchars('Bonjour ' .$_POST['sexe'] .' '. $_POST['nom'] .' !');
        }   else {
          echo 'Remplis bien les informations du formulaire!';
          header('Refresh: 2');
            }
          }
     ?>
  </body>
</html>
