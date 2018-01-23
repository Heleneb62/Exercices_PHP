<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exo5</title>
  </head>
  <body>
    <?php
      echo 'Table de multiplication de 13 <br><br>';

      $fin = 13;
      $compteur = 1;
      $resultat;
      while ($compteur<=$fin) {
        echo $fin . ' * ' . $compteur . ' = ';
        $resultat = $fin * $compteur;
        $compteur++;
        echo $resultat . '<br>';
      }
     ?>

  </body>
</html>
