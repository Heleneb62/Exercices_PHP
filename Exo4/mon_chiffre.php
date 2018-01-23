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
    if ((isset($_POST['mon_chiffre']) && trim($_POST['mon_chiffre']) != "") AND !ctype_alpha($_POST['mon_chiffre']) AND is_numeric($_POST['mon_chiffre']) AND (is_int($_POST['mon_chiffre']) OR $_POST['mon_chiffre'] == 0) ) {
    echo 'Calcul de la factorielle de ' . $_POST['mon_chiffre'] . '<br><br>';
    while ($nombre <= $_POST['mon_chiffre']) {
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
