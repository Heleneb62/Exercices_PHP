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
    if ((isset($_POST['mon_chiffre']) && trim($_POST['mon_chiffre']) != "") AND is_numeric($_POST['mon_chiffre']) OR $_POST['mon_chiffre'] === 0 ) {
    $mon_chiffre2 = (int) $_POST['mon_chiffre'];
    echo 'Calcul de la factorielle de ' . $mon_chiffre2 . '<br><br>';
    while ($nombre <= $mon_chiffre2) {
      echo $nombre . ' * ' . $resultat . ' = ' ;
      $resultat = $resultat * $nombre;
      echo $resultat . '<br>';
      $nombre++;
    }
    echo '<br>Le résultat est de ' . $resultat;
  } else {
    echo "Il faut donner un chiffre entier!";
  }
    ?>

  </body>
</html>
