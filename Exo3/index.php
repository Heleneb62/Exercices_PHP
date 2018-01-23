<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exo3</title>
  </head>
  <body>
    <?php
        $resultat = 1;
        $nombre = 1;
        echo 'Calcul de la factorielle de 10<br><br>';
        while ($nombre <= 10) {
          echo $nombre . ' * ' . $resultat . ' = ' ;
          $resultat = $resultat * $nombre;
          echo $resultat . '<br>';
          $nombre++;
        }
        echo '<br>Le résultat est de ' . $resultat;
     ?>

  </body>
</html>
