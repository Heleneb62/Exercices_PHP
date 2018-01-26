<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exo9</title>
  </head>
  <body>
    <div>
      <p>
        Objectif: créer un formulaire d'inscription et un espace de connexion pour ensuite l'inclure au
        site Rose Prévost.
      </p>
      <?php
        try
        {
          $bdd = new PDO('mysql:host=localhost;dbname=Espace_connexion;charset=utf8', 'root', 'root',
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
          die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM Membres') or die(print_r($bdd->errorInfo()));
        while ($resultat = $reponse->fetch())
        {
          echo $resultat['ID'];
          echo "<br/>";
          echo $resultat['username'];
          echo "<br/>";
          echo $resultat['password'];
          echo "<br/>";
          echo $resultat['nom'];
          echo "<br/>";
          echo $resultat['prenom'];
          echo "<br>";
          echo $resultat['email'];
          echo "<br/>";
          echo "<br/>";
        }
        $reponse->closeCursor();
      ?>
    </div>
    <div>
      <h2>Formulaire d'inscription</h2>
      <p>
        <form action="index.php" method="POST">
          <label>Votre nom<input required type="text" name="nom"></label><br>
          <label>Votre prénom<input required type="text" name="prenom"></label><br>
          <label>Votre mail<input required type="mail" name="mail"></label><br>
          <label>Votre pseudonyme<input required  type="text" name="username"></label><br>
          <label>Votre mot de passe<input required type="password" name="password"></label><br>
          <input type="submit" value="Vous inscrire">
        </form>
      </p>
      <?php

        if (isset($_POST['nom'])) {
          $nom = htmlspecialchars($_POST['nom']);
          $prenom = htmlspecialchars($_POST['prenom']);
          $mail = htmlspecialchars($_POST['mail']);
          $username = htmlspecialchars($_POST['username']);
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $creation = $bdd->prepare('INSERT INTO Membres (username, password, nom, prenom, email)
        VALUES (?, ?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
        $creation->execute(array($username, $password, $nom, $prenom, $mail ));
        $creation->closeCursor();
      }

      ?>
    </div>
    <div>
      <h3>Espace connexion</h3>
      <p>
        <form action="index.php" method="POST">
          <label>Votre pseudonyme<input type="text" required name="username2"></label><br>
          <label>Votre mot de passe<input type="password" required name="password2"></label><br>
          <input type="submit" value="Vous connecter">
        </form>
      </p>
    </div>
    <?php if (isset($_POST['username2']) && isset($_POST['password2'])) {
      $verification = $bdd->prepare('SELECT * FROM Membres WHERE username = ?');
      $verification->execute(array($_POST['username2']));
      $utilisateur = $verification->fetch();
      // echo '<pre>';
      // var_dump($utilisateur);
      // echo '</pre>';
      if (($utilisateur && password_verify($_POST['password2'], $utilisateur['password'])) || ($utilisateur === true)) {
        echo "bravo, vous êtes connecté!";
      } else {
        echo "Erreur, recommencez";
      }
      $verification->closeCursor();
    }
    ?>



  </body>
</html>
