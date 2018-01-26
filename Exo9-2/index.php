<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Prévost Rose, fleuriste</title>
  </head>
  <body>
    <nav class="nav1">
      <img src="img/logo2.png" class="logo" alt="logo">
        <div class="navig">
          <a href="#Home" class="a">Home</a>
          <a href="#Product" class="a">Produit</a>
          <a href="#store" class="a">Boutique</a>
          <a href="#contact" class="a">Contact</a>
        </div>
      </nav>
      <section id="Home">
        <aside id="formu">
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
          ?>
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
          <h3>Espace connexion</h3>
          <p>
            <form action="index.php" method="POST">
              <label>Votre pseudonyme<input type="text" required name="username2"></label><br>
              <label>Votre mot de passe<input type="password" required name="password2"></label><br>
              <input type="submit" value="Vous connecter">
            </form>
          </p>
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
        </aside>
        <article class="article1">
          <h1 class="titre1">
            Rose Prévost, la fleuriste boulonnaise
          </h1>
          <p class="paragraphe1">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Vivamus nec nulla quis orci aliquet ornare sed nec velit.
              Donec mollis ultricies sagittis. Sed placerat sagittis urna,
              in accumsan tortor imperdiet.
          </p>
          <a href="#Product" class="bouton">Nos produits</a>
        </article>
      </section>
      <section id="Product">
        <div class="titre2">
          <h2 class="titre2enfant">Nous vous proposons...</h2>
        </div>
        <div class="cards">
          <div class="card">
            <div class="cardimg">
              <img src="img/flower3.jpg" alt="flower3" />
            </div>
            <div class="cardinfo">
              <h3 class="h3">Fleur 1</h3>
              <span class="prix">Prix: 10€00</span>
            </div>
          </div>
          <div class="card">
            <div class="cardimg">
              <img src="img/flower17.jpg" alt="flower17">
            </div>
            <div class="cardinfo">
              <h3 class="h3">Fleur 2</h3>
              <span class="prix">Prix: 10€00</span>
            </div>
          </div>
          <div class="card">
            <div class="cardimg">
              <img src="img/flower14.jpg" alt="flower14">
            </div>
            <div class="cardinfo">
              <h3 class="h3">Fleur 3</h3>
              <span class="prix">Prix: 10€00</span>
            </div>
          </div>
          <div class="card">
            <div class="cardimg">
              <img src="img/flower18.jpg" alt="flower18">
            </div>
            <div class="cardinfo">
              <h3 class="h3">Fleur 4</h3>
              <span class="prix">Prix: 10€00</span>
            </div>
          </div>
        </div>
      </section>
      <section id="store">
        <article class="article2">
          <h2 class="titreh2">Notre boutique...</h2>
          <p class="paragraphe2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus nec nulla quis orci aliquet ornare sed nec velit.
          </p>
          <a href="mailto:rose-prevost@fleuriste-boulogne.fr" target="_blank" class="mail">@Contactez-nous</a>
          <div class="liens">
            <a href="https://fr-fr.facebook.com/" target="_blank">
              <img src="img/facebook.png" alt="facebook">
            </a>
            <a href="https://twitter.com/?lang=fr" target="_blank">
              <img src="img/twitter.png" alt="twitter">
            </a>
            <a href="https://www.instagram.com/?hl=fr" target="_blank">
              <img src="img/instagram.png" alt="instagram">
            </a>
          </div>
        </article>
      </section>
      <section id="contact">
        <form class="formulaire">
          <div class="ligne1">
            <input type="text" id="nom" name="nom" placeholder="Nom Prénom">
          </div>
          <div class="ligne2">
            <input type="email" id="email" name="email" placeholder="Votre adresse électronique">
          </div>
          <div class="text">
            <textarea placeholder="Votre message" id="message"></textarea>
          </div>
          <div class="submit">
            <input type="submit" id="envoyer" value="Envoyer">
          </div>
        </form>
      </section>
      <footer>
        <nav class="nav2">
          <a class="a2">&copy; 2017 Belval Hélène</a>
        </nav>
        <a href="pages/mentions.php" target="_blank" class="mention">Mentions légales</a>
        <div class="nav3">
          <a href="https://fr-fr.facebook.com/" target="_blank"><img src="img/02_facedebook.png" class="icones" alt="facedebouk"></a>
          <a href="https://fr.linkedin.com/" target="_blank"><img src="img/07_linkekedin.png" class="icones" alt="linkekedin"></a>
          <a href="https://www.instagram.com/?hl=fr" target="_blank"><img src="img/10_instatagram.png" class="icones" alt="instatagram"></a>
          <a href="https://fr.wordpress.org/" target="_blank"><img src="img/11_wordpress.png" class="icones" alt="wordpress"></a>
          <a href="https://www.pinterest.fr/" target="_blank"><img src="img/bouh.png" class="icones" alt="bouhpint"></a>
          <a href="https://www.tumblr.com/" target="_blank"><img src="img/babou.png" class="icones" alt="babou"></a>
          <a href="https://twitter.com/?lang=fr" target="_blank"><img src="img/paf.png" class="icones" alt="twittos"></a>
          <a href="https://plus.google.com/discover?hl=fr" target="_blank"><img src="img/14_google+.png" class="icones" alt="google+"></a>
        </div>
      </footer>
  </body>
</html>
