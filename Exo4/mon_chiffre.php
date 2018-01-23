<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Résultat</title>
  </head>
  <body>
    <?php
    $resultat = 1;
    $nombre = 1;
    // $mon_chiffre = 8;
    echo 'Calcul de la factorielle de ' . $_POST['mon_chiffre'] . '<br><br>';
    while ($nombre <= $_POST['mon_chiffre']) {
      echo $nombre . ' * ' . $resultat . ' = ' ;
      $resultat = $resultat * $nombre;
      echo $resultat . '<br>';
      $nombre++;
    }
    echo '<br>Le résultat est de ' . $resultat;

    ?>

  </body>
</html>
